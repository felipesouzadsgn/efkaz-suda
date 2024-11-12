<?php

namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model
{
    protected $table = 'sessions'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária

    // Campos permitidos para inserção e atualização
    protected $allowedFields = ['created', 'visit_hash', 'updated', 's1_nome', 's1_confirma', 's2_email', 's2_telefone', 's2_confirma', 's3_dia', 's3_mes', 's3_ano', 's3_nascimento', 's4_mensalidade', 's4_produtos', 's5_escolha', 's5_cadastro'];

    // Define o uso automático dos timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
}