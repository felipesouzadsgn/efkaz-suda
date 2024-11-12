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

    // nome
    public function step1()
    {
        // Session
        $session = session();

        // Verifica
        $has_hash = $session->get('visitHash');


        if (isset($has_hash) && $has_hash != '') {
            echo $has_hash;

        } else {
            // Gera um hash público
            $visitHash = bin2hex(random_bytes(16));
            // Armazenar detalhes como IP e timestamp
            $visitData = [
                'hash' => $visitHash,
                'ip' => $this->request->getIPAddress(),
                'timestamp' => time(),
            ];
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
        $session->set('step1Data', $this->request->getPost());


        $step1 = $session->get('step1Data');

        return view('simulador/step2');
    }

    // nascimento
    public function step3()
    {

        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        $session->set('step2Data', $this->request->getPost());
        
        // Combina os dados da sessão com novos dados
        $step1 = $session->get('step1Data');
        $step2 = $session->get('step2Data');
        $data['visit_hash'] = $visitHash;
        
        $data['data_step_1'] = json_encode($step1);
        $data['data_step_2'] = json_encode($step2);
        
        // Salva no banco
        $model = new \App\Models\SessionModel();

        // Salva os dados no banco
        if ($model->save($data)) {

            $sessionID = $model->getInsertID();
            $session->set('sessionID', $sessionID);

        } else {

            // Flash Mensagem
        }

        return view('simulador/step3');
    }

    // opcoes
    public function step4()
    {

        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        $session->set('step3Data', $this->request->getPost());
        

        // Combina os dados da sessão com novos dados
        $step3 = $session->get('step3Data');
        $data['data_step_3'] = json_encode($step3);
        
        // Salva no banco
        $model = new \App\Models\SessionModel();
        $sessionData = $model->where('visit_hash', $visitHash)->first();

        // Salva os dados no banco
        if ($sessionData) {
            $model->update($sessionData['id'], ['data_step_3' => $data]);
        }
        else {
            // Flash Mensagem
        }

        return view('simulador/step4');
    }

    // resumo
    public function step5()
    {

        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        $session->set('step4Data', $this->request->getPost());
        

        // Combina os dados da sessão com novos dados
        $step4 = $session->get('step4Data');
        $data['data_step_4'] = json_encode($step4);
        
        // Salva no banco
        $model = new \App\Models\SessionModel();
        $sessionData = $model->where('visit_hash', $visitHash)->first();

        // Salva os dados no banco
        if ($sessionData) {
            $model->update($sessionData['id'], ['data_step_4' => $data]);
        }
        else {
            // Flash Mensagem
        }

        return view('simulador/step5');
    }


    // obrigado
    public function fim()
    {

        // Session
        $session = session();
        $visitHash = $session->get('visitHash');
        $session->set('step5Data', $this->request->getPost());
        

        // Combina os dados da sessão com novos dados
        $step5 = $session->get('step5Data');
        $data['data_step_5'] = json_encode($step5);
        
        // Acha no banco
        $model = new \App\Models\SessionModel();
        $sessionData = $model->where('visit_hash', $visitHash)->first();

        // Salva os dados no banco
        if ($sessionData) {
            $model->update($sessionData['id'], ['data_step_5' => $data]);
        }
        else {
            // Flash Mensagem
        }

        if ($step5['cadastro'] == 'true') {

            return redirect()->to('cadastro?token='.$visitHash);

        }

        return view('simulador/fim');
    }




}







