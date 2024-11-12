<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Cadastro extends Controller
{
    public function step1()
    {
        $session = session();

        $hash = @$this->request->getGet('token');

        if (isset($hash) && $hash != '') {

            // Acha no banco
            $model = new \App\Models\SessionModel();
            $sessionData = $model->where('visit_hash', $hash)->first();

            if ($sessionData) {
                $formattedData = [];

                // Loop para remover prefixos e transformar nascimento em objeto de data
                foreach ($sessionData as $key => $value) {
                    // Remove prefixos (s1_, s2_, etc.)
                    $cleanKey = preg_replace('/^s[1-5]_/', '', $key);

                    // Transformar nascimento em objeto de data
                    if ($cleanKey === 'nascimento' && !empty($value)) {
                        $dateParts = explode('-', $value); // Exemplo: '1990-05-15'
                        if (count($dateParts) === 3) {
                            $formattedData[$cleanKey] = [
                                'ano' => $dateParts[0],
                                'mes' => $dateParts[1],
                                'dixa' => $dateParts[2]
                            ];
                        }
                    } else {
                        $formattedData[$cleanKey] = $value;
                    }
                }
                // $session->set('dadosCadastro', $formattedData);
            }
        }

        // return view('cadastro/step1', ['dadosCadastro' => $formattedData]);
        return view('cadastro/step1', ['dadosCadastro' => $formattedData]);
    }
    public function step2()
    {
        // Session
        $session = session();
        $hash = @$this->request->getGet('token');

        return view('cadastro/step2');
    }
    public function step3()
    {
        // Session
        $session = session();
        $hash = @$this->request->getGet('token');

        return view('cadastro/step3');
    }

    public function step4()
    {
        // Session
        $session = session();
        $hash = @$this->request->getGet('token');

        return view('cadastro/step4');
    }
}
