<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class ContasController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Conta::class);

        $contas = Conta::all();
        return view('user-bills', compact('contas'));
    }

    public function show(Conta $conta)
    {
        $this->authorize('view', $conta);

        return view('bill-details', compact('conta'));
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

        return redirect()->route('user-bills')->with('success', 'Conta atualizada com sucesso!');
        //return redirect()->route('bill-details', ['id' => $conta->id])->with('success', 'Conta atualizada com sucesso!');
    }

    public function destroy(Conta $conta)
    {
        $this->authorize('delete', $conta);

        $conta->delete();

        return redirect()->route('user-bills')->with('success', 'Conta excluída com sucesso!');
    }
}
