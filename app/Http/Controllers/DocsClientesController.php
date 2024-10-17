<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DocTipo;
use App\Models\DocsCliente;
use Illuminate\Http\Request;

class DocsClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cliente $cliente)
    {
        $cliente = Cliente::find($cliente->id);
        $docTipos = DocTipo::all(); // Pega todos os tipos de documentos
        return view('clientes.docs.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $cliente_id)
    {
        $validatedData = $request->validate([
            'doc_tipo' => 'required|array', // Valida como array
            'doc_tipo.*' => 'integer', // Cada valor do array deve ser um inteiro
            'nome' => 'required|string|max:255',
            'data' => 'required|date',
            'docs' => 'required|array',
          
        ]);
    
        $filePaths = [];
    
        // Armazena cada arquivo e salva o caminho no array
        foreach ($request->file('docs') as $file) {
            $filePaths[] = $file->store('docs_clientes', 'public');
        }
    
        // Itera sobre os tipos de documentos selecionados
        foreach ($validatedData['doc_tipo'] as $tipoId) {
            // Cria o registro no banco de dados com os caminhos dos arquivos como JSON
            DocsCliente::create([
                'cliente_id' => $cliente_id,
                'doc_tipo' => $tipoId,
                'nome' => $validatedData['nome'],
                'data' => $validatedData['data'],
                'docs' => json_encode($filePaths), // Armazena os caminhos dos arquivos como JSON
            ]);
        }
    
        return redirect()->back()->with('success', 'Documentos adicionados com sucesso!');
    }
    

    public function tipoDocs()
    {
        $docTipos = DocTipo::all(); // Pega todos os tipos de documentos
        return view('clientes.docs.tipos-docs', get_defined_vars());
    }

    public function docTipoCreate()
    {
        return view('clientes.docs.create-doc-tipo');
    }

    // Função para armazenar um novo tipo de documento
    public function docTipoStore(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Criação de um novo tipo de documento
        $docTipo = DocTipo::create([
            'nome' => $validatedData['nome'],
        ]);

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Tipo de documento cadastrado com sucesso!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
