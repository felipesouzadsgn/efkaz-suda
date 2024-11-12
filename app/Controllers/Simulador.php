<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Simulador extends Controller
{
    function mascararId($id) {
        $prefix = 'CAD';
        $suffix = 'SUD';
        $encoded = base64_encode($prefix . $id . $suffix);
        return str_replace('=', '', $encoded);
    }

    function desmascararId($hash) {
        $decoded = base64_decode($hash);
        $id = substr($decoded, 3, -3);
        return $id;
    }

    function findSession($hash)
    {
		$model = new \App\Models\SessionModel();
        $sessionData = $model->where('visit_hash', $hash)->first();
        return $sessionData;
    }
	public function saveStep()
	{
	    $session = session();

	    // Dados de teste (para não precisar de requisições reais)
	    // $data = [
	    //     'nome' => 'Dyego',  // Exemplo de dado fake para etapa 1
	    //     'confirma_1' => 'true'  // Exemplo de dado fake para etapa 1
	    // ];
	    
	    // Definir qual etapa (step) está sendo salva
	    // $step = 1;  // Etapa fake

	    // Hash de visita fake
	    // $visitHash = 'abc123';

	    // Descomente estas linhas quando for utilizar dados reais:
	    $data = $this->request->getPost();
	    $step = $data['step'];
	    $visitHash = $session->get('visitHash');

	    $model = new \App\Models\SessionModel();

	    // Verifica se já existe um registro com o mesmo visit_hash
	    $model_check = $model->where('visit_hash', $visitHash)->first();

	    // Array para armazenar os dados a serem salvos no banco
	    $dataToSave = [];

	    // Mescla os dados de cada etapa com os existentes na sessão e prepara o array para salvar no banco
	    switch ($step) {
	        case 1:
	            $session->set('step1Data', $data);
	            $dataToSave['s1_nome'] = $data['nome'];
	            $dataToSave['s1_confirma'] = $data['confirma_1'];
	            break;

	        case 2:
	            $session->set('step2Data', $data);
	            $dataToSave['s2_email'] = $data['email'];
	            $dataToSave['s2_telefone'] = $data['telefone'];
	            $dataToSave['s2_confirma'] = $data['confirma_2'];
	            break;

			case 3:
	            $session->set('step3Data', $data);
	            $dataToSave['s3_dia'] = $data['dia'];
	            $dataToSave['s3_mes'] = $data['mes'];
	            $dataToSave['s3_ano'] = $data['ano'];
	            $dataToSave['s3_nascimento'] = "{$data['ano']}-{$data['mes']}-{$data['dia']}";
	            break;

	        case 4:
	            $session->set('step4Data', $data);
	            $dataToSave['s4_mensalidade'] = $data['mensalidade'];
	            $dataToSave['s4_produtos'] = $data['produtos'];
	            break;

	        case 5:
	            $session->set('step5Data', $data);
	            $dataToSave['s5_escolha'] = $data['escolha'];
	            $dataToSave['s5_cadastro'] = $data['cadastro'];
	            break;
	    }

	    // Verifica se já existe uma sessão com o 'visit_hash'
	    if ($model_check) {
	        $model->update($model_check['id'], $dataToSave);
	    } else {
	        $dataToSave['visit_hash'] = $visitHash;
	        $dataToSave['visit_ip'] = $this->request->getIPAddress();
	        $model->insert($dataToSave);
	        $session->set('sessionID', $model->getInsertID());
	    }

	    // Define a próxima URL com base na etapa atual
	    $nextUrl = base_url("simulador/" . ($step + 1));

	    // Se for o último passo, redireciona para a página final
	    if ($step == 5) {
	        $nextUrl = base_url('simulador/fim');
	    }

	    return $this->response->setJSON(['nextUrl' => $nextUrl]);
	}
    // nome
    public function step1()
    {
    	// Get Data
    	// $data = $this->request->getPost();
        // Session
        $session = session();
    	// $session->destroy();
    	// die;

        // Verifica
        $has_hash = $session->get('visitHash');
		
		// Gera um hash público
        if (isset($has_hash) && $has_hash != '') {
            
            // Destroi a seção se já houver uma a mais de 30m
			if ($session->has('lastActivity')
				&& (time() - session()->get('lastActivity') > 1800)) {

			    $session->destroy();

				$visitHash = bin2hex(random_bytes(16));
	            $session->set('lastActivity', time());
	            $session->set('visitHash', $visitHash);

	            return redirect()->to('/simulador');
			}

        } else {
            
            $visitHash = bin2hex(random_bytes(16));
            $session->set('lastActivity', time());
            $session->set('visitHash', $visitHash);
        }
		
		return view('simulador/step1');

    }
    // contato
    public function step2()
    {
        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        
        return view('simulador/step2');
    }

    // nascimento
    public function step3()
    {
        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        
        return view('simulador/step3');
    }

    // opcoes
    public function step4()
    {

        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        $step3Data = $session->get('step3Data');


		// Verifica se os dados de nascimento estão presentes
		if (isset($step3Data['dia']) && isset($step3Data['mes']) && isset($step3Data['ano'])) {
		    // Dados da data de nascimento
		    $dia = $step3Data['dia'];
		    $mes = $step3Data['mes'];
		    $ano = $step3Data['ano'];

		    // Data de nascimento em formato DateTime
		    $dataNascimento = new \DateTime("$ano-$mes-$dia");

		    // Data atual
		    $dataAtual = new \DateTime();

		    // Calcula a diferença em anos
		    $idade = $dataAtual->diff($dataNascimento)->y;

		}

        return view('simulador/step4', ['idade' => $idade]);

    }

    // resumo
    public function step5()
    {

        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        
        // Combina os dados da sessão com novos dados
        $step4 = $session->get('step4Data');

        return view('simulador/step5');
    }


    // obrigado
    public function fim()
    {

        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        $step5 = $session->get('step5Data');


        if ($step5['cadastro'] == 'true') {

            return redirect()->to('cadastro?token='.$visitHash);

        }

        return view('simulador/fim');
    }
    public function obrigado()
    {

        // Session
        $session = session();
        $visitHash = $session->get('visitHash');

        return view('simulador/obrigado');
    }
		




}







