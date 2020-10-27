<?php

namespace App\Http\Controllers;

use App\Http\Requests\Imovel\SalvarRequest;
use App\Models\Imoveis;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{

    public function index()
    {
        $imoveis = Imoveis::all();
        return view('listagem')->with(
            [
                'imoveis' => $imoveis,
            ]
        );
    }

    public function buscar(
        Request $request
    )
    {
        try {

            $email = $request->get('emailprop');
            $imovel = Imoveis::where('e_mail',$email)->first();

            return view('editar')->with(
                [
                    'proprietario' => $imovel->proprietario,
                    'tipo_pessoa' => $imovel->tipo_pessoa,
                    'documento' => $imovel->documento,
                    'e_mail' => $imovel->e_mail,
                    'cep' => $imovel->cep,
                    'logradouro' => $imovel->logradouro,
                    'numero' => $imovel->numero,
                    'bairro' => $imovel->bairro,
                    'cidade' => $imovel->cidade,
                    'estado' => $imovel->estado,
                    'status' => $imovel->status,
                ]
            );

        } catch (\Throwable $exception) {

//            return redirect()->back()->with('erro', 'Imóvel não localizado');
            return view('adicionar')->with(
                [
                    'proprietario' => $request->input('Proprietario'),
                    'tipopessoa' => $request->input('tipo_pessoa'),
                    'documento' => $request->input('documento'),
                    'e_mail' => $request->input('email'),
                    'cep' => $request->input('cep'),
                    'logradouro' => $request->input('logradouro'),
                    'numero' => $request->input('numero'),
                    'bairro' => $request->input('bairro'),
                    'cidade' => $request->input('cidade'),
                    'estado' => $request->input('estado'),
                    'status' => $request->input('contratado'),
                ]
            );

        }

    }

    public function editarview(
        int $id
    )
    {
        try {

            $imovel = Imoveis::where('id',$id)->first();

            return view('editar')->with(
                [
                    'proprietario' => $imovel->proprietario,
                    'tipopessoa' => $imovel->tipo_pessoa,
                    'cpfcnpj' => $imovel->documento,
                    'email' => $imovel->e_mail,
                    'cep' => $imovel->cep,
                    'logradouro' => $imovel->logradouro,
                    'numero' => $imovel->numero,
                    'bairro' => $imovel->bairro,
                    'cidade' => $imovel->cidade,
                    'estado' => $imovel->estado,
                    'contratado' => $imovel->status,
                ]
            );

        } catch (\Throwable $exception) {

        }

    }

    public function salvar(
        SalvarRequest $request
    ) {
        $email = Imoveis::where('e_mail', $request->input('email'))->first();

        if (!$email) {
            Imoveis::create(
                [
                    'proprietario' => $request->input('proprietario'),
                    'tipo_pessoa' => $request->input('tipo_pessoa'),
                    'documento' => $request->input('documento'),
                    'e_mail' => $request->input('e_mail'),
                    'cep' => $request->input('cep'),
                    'logradouro' => $request->input('logradouro'),
                    'numero' => $request->input('numero'),
                    'complemento' => $request->input('complemento'),
                    'bairro' => $request->input('bairro'),
                    'cidade' => $request->input('cidade'),
                    'estado' => $request->input('estado'),
                    'status' => $request->input('status'),
                ]
            );

            return redirect('/')->withSucesso('Imovel salvo com sucesso!');
        }

    }

    public function delete(
        int $id
    )
    {
        $imovel = Imoveis::where('id',$id)->first();

        if ($imovel) {
            $imovel->delete();
            return redirect('/')->withSucesso('Imovel deletado com sucesso!!');
        }

        return redirect('/')->withSucesso('Imovel já deletado!!');

    }

    public function updateview(
        int $id,
        Request $request
    )

    {

//        dd($request);
        $imovel = Imoveis::where('id',$id)->first();

//        dd($imovel);

        if ($imovel) {

            $imovel->update($request->all());
            return redirect('/')->withSucesso('Imovel atualizado com sucesso!!');
        }

        return redirect('/')->withSucesso('Imovel nâo atualizado !!');

    }


    public function update(
        int $id)

    {
        $imovel = Imoveis::where('id',$id)->first();

        if ($imovel) {

            return view('update')->with(
                [
                    'registro' => $imovel->id,
                    'proprietario' => $imovel->proprietario,
                    'tipo_pessoa' => $imovel->tipo_pessoa,
                    'documento' => $imovel->documento,
                    'e_mail' => $imovel->e_mail,
                    'cep' => $imovel->cep,
                    'logradouro' => $imovel->logradouro,
                    'numero' => $imovel->numero,
                    'bairro' => $imovel->bairro,
                    'cidade' => $imovel->cidade,
                    'estado' => $imovel->estado,
                    'status' => $imovel->status,
                ]
            );
        }

        return redirect('/')->withSucesso('Imovel não encontrado!');
    }


    public function editar(
        SalvarRequest $request
    ) {
        $email = Imoveis::where('e_mail', $request->input('email'))->first();

        if (!$email) {
            Imoveis::create(
                [
                    'proprietario' => $request->input('proprietario'),
                    'tipo_pessoa' => $request->input('tipopessoa'),
                    'documento' => $request->input('documento'),
                    'e_mail' => $request->input('email'),
                    'cep' => $request->input('cep'),
                    'logradouro' => $request->input('logradouro'),
                    'numero' => $request->input('numero'),
                    'complemento' => $request->input('complemento'),
                    'bairro' => $request->input('bairro'),
                    'cidade' => $request->input('cidade'),
                    'estado' => $request->input('estado'),
                    'status' => $request->input('contratado'),
                ]
            );

            return redirect('/')->withSucesso('Imovel salvo com sucesso!');
        }

        return redirect('/')->withErro('O imovel já esta cadastrado!');

    }

    public function adicionar()
    {
        return view('busca');
    }

    public function vercontrato(
        int $id
    ) {
        $imovel = Imoveis::where('id', $id)->first();
//        dd($imovel);

        if ($imovel) {

            return view('contrato')->with(
                [
                    'registro' => $imovel->id,
                    'proprietario' => $imovel->proprietario,
                    'tipo_pessoa' => $imovel->tipo_pessoa,
                    'documento' => $imovel->documento,
                    'e_mail' => $imovel->e_mail,
                    'cep' => $imovel->cep,
                    'logradouro' => $imovel->logradouro,
                    'numero' => $imovel->numero,
                    'bairro' => $imovel->bairro,
                    'cidade' => $imovel->cidade,
                    'estado' => $imovel->estado,
                    'status' => $imovel->status,
                ]
            );
        }
    }

    public function voltarlista()
    {
        return redirect('/')->withErro('Contrato verificado com sucesso!');

    }

}
