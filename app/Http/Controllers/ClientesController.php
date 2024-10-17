<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|max:20',
            'cep' => 'nullable|string|max:10',
            'endereco' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'nullable|string|max:100',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:2',
            'pais' => 'nullable|string|max:50',
            'responsavel' => 'nullable|string|max:255',
            'documento' => 'nullable|string|max:20',
            'observacao' => 'nullable|string|max:1000',
            'status' => 'required|integer|in:0,1',
        ]);

        // Criação de um novo cliente
        $cliente = Cliente::create($validatedData);

        // Retorna uma resposta JSON de sucesso
        return response()->json(['message' => 'Cliente cadastrado com sucesso!', 'cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Valida os dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|max:20',
            'cep' => 'nullable|string|max:10',
            'endereco' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'nullable|string|max:100',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:2',
            'pais' => 'nullable|string|max:50',
            'responsavel' => 'nullable|string|max:255',
            'documento' => 'nullable|string|max:20',
            'observacao' => 'nullable|string|max:1000',
            'status' => 'required|integer|in:0,1',
        ]);

        // Busca o cliente pelo ID
        $cliente = Cliente::findOrFail($id);

        // Atualiza os dados do cliente
        $cliente->update($validatedData);

        // Retorna uma resposta JSON
        return response()->json(['message' => 'Cliente atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        // Deleta o cliente
        $cliente->delete();

        // Retorna uma resposta JSON
        return response()->json(['message' => 'Cliente deletado com sucesso!']);
    }
}
