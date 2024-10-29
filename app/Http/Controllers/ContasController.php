<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Conta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ContasController extends Controller
{

    use AuthorizesRequests;

    public function index() // Visualizar vagas do usuário
    {
        $contas = Conta::where('user_id', Auth::Id())->get();

        return view('bills.bills', compact('contas'));
    }

    public function allBills() // Visualizar todas as vagas (ADMIN)
    {
        $this->authorize('viewAny', Conta::class);

        $contas = Conta::all();
        return view('bills.admin.all-bills', compact('contas'));
    }

    public function show(Conta $conta)
    {
        $this->authorize('view', $conta);

        $user = User::find($conta->user_id);

        $conta['user_name'] = $user->name;

        return view('bills.bill-details', compact('conta'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Conta::class);

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'valor' => 'required|numeric|min:0',
            'data_vencimento' => 'required|date',
            'status' => 'required|in:pago,pendente',
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        try {
            Conta::create($validatedData);
            return redirect()->route('user-bills')->with('success', 'Conta adicionada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Falha ao criar a conta. Tente novamente.']);
        }
    }

    public function update(Request $request, Conta $conta)
    {
        $this->authorize('update', $conta);

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'valor' => 'required|numeric|min:0',
            'data_vencimento' => 'required|date',
            'status' => 'required|in:pago,pendente',
        ]);

        $conta->update($validatedData);

        return redirect()->route('bill-details', ['conta' => $conta->id])->with('success', 'Conta atualizada com sucesso!');
    }

    public function destroy(Conta $conta)
    {
        $this->authorize('delete', $conta);

        $conta->delete();

        return redirect()->route('user-bills')->with('success', 'Conta excluída com sucesso!');
    }

    /*
        A dashboard tem uma contagem de contas Pagas, Pendentes, Expiradas e Expiração Próxima
        Seria interessante armazenar isso em Cache para não precisar fazer essa consulta toda vez
        que abrir a página inicial e refresh quando o usuário atualizar alguma conta.
    */
    public function dashboard()
    {
        $hoje = Carbon::today();
        $userId = Auth::id();

        // Realizar uma única consulta e agrupar os resultados
        $contas = Conta::selectRaw("
            COUNT(CASE WHEN status = 'pago' THEN 1 END) as contasPagas,
            COUNT(CASE WHEN status = 'pendente' AND data_vencimento > ? THEN 1 END) as contasPendentes,
            COUNT(CASE WHEN status = 'pendente' AND data_vencimento < ? THEN 1 END) as contasExpiradas,
            COUNT(CASE WHEN status = 'pendente' AND data_vencimento BETWEEN ? AND ? THEN 1 END) as contasExpiracaoProxima
        ", [$hoje, $hoje, $hoje, $hoje->copy()->addDays(7)])
            ->where('user_id', $userId)
            ->first();

        return view('dashboard', [
            'contasPagas' => $contas->contasPagas,
            'contasPendentes' => $contas->contasPendentes,
            'contasExpiradas' => $contas->contasExpiradas,
            'contasExpiracaoProxima' => $contas->contasExpiracaoProxima,
        ]);
    }
}
