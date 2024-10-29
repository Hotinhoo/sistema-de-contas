<?php

namespace Tests\Feature;

use App\Models\Conta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContaTest extends TestCase
{

    /* 
        Verificações Básicas para atestar o funcionamento dos controllers de Conta
        Para evitar confuções nos comentários marquei Contas como Bills
    */

    use RefreshDatabase;

    // Teste de criação de Bill
    public function test_usuario_autenticado_pode_criar_conta()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $data = [
            'titulo' => 'Conta de Teste',
            'descricao' => 'Descrição da conta de teste',
            'valor' => 100.50,
            'data_vencimento' => '2024-12-01',
            'status' => 'pendente'
        ];

        $response = $this->post('/conta', $data);

        $this->assertDatabaseHas('contas', $data);

        $response->assertRedirect(route('user-bills')); // Se o usuário foi redirecionado para essa rota significa que o código passou

    }

    // Teste de Edição de Bill
    public function test_usuario_pode_editar_sua_conta()
    {
        $user = User::factory()->create();
        $conta = Conta::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $updatedData = [
            'titulo' => 'Conta Editada',
            'descricao' => 'Descrição atualizada',
            'valor' => 150.75,
            'data_vencimento' => '2024-12-31',
            'status' => 'pago',
        ];

        $response = $this->put("/conta/{$conta->id}", $updatedData);

        $this->assertDatabaseHas('contas', array_merge($updatedData, ['id' => $conta->id]));

        $response->assertRedirect(route('user-bills'));
        
    }

    // Teste de Autenticação para Criação
    public function test_apenas_usuario_autenticado_pode_criar_conta()
    {
        $data = [
            'titulo' => 'Conta de Teste',
            'descricao' => 'Descrição da conta de teste',
            'valor' => 100.50,
            'data_vencimento' => '2024-12-01',
            'status' => 'pendente',
        ];

        $response = $this->post('/conta', $data); // Tentativa de criação sem autenticação

        // Verifica se o acesso é negado
        $response->assertRedirect('/login'); // Redireciona para login
        $this->assertDatabaseMissing('contas', $data); // Não cria no banco
    }

    // Teste de Permissão de Acesso para Edição por Outro Usuário
    public function test_usuario_nao_pode_editar_conta_de_outro_usuario()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $conta = Conta::factory()->create(['user_id' => $user1->id]);

        $this->actingAs($user2);

        $updatedData = [
            'titulo' => 'Tentativa de Edição',
            'descricao' => 'Não deve ser permitida',
            'valor' => 500,
        ];

        $response = $this->put("/conta/{$conta->id}", $updatedData);

        $this->assertDatabaseMissing('contas', $updatedData);
        $response->assertStatus(403);
    }
}
