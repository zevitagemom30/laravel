<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModel;

class Municipes extends AbstractModel
{
    use HasFactory;

    //protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    
    protected $fillable = [
        'id',
        'codigo_cns',
        'cartao_provisorio',
        'nome',
        'data_nascimento',
        'sexo_id',
        'nome_mae',
        'nome_pai',
        'nome_responsavel',
        'ocupacao_id',
        'frequenta_escola',
        'raca_cor_id',
        'grau_escolaridade_id',
        'permanencia_id',
        'tempo_municipio',
        'reside_desde',
        'estado_civil_id',
        'telefone_residencial',
        'telefone_comercial',
        'telefone_celular',
        'email',
        'identidade_numero',
        'identidade_orgao_emissor_id',
        'identidade_estado_id',
        'identidade_data_emissao',
        'titulo_eleitor_numero',
        'titulo_eleitor_zona',
        'titulo_eleitor_secao',
        'cpf_numero',
        'tipo_logradouro_id',
        'residencia_logradouro',
        'residencia_numero',
        'residencia_bairro',
        'residencia_municipio_id',
        'residencia_estado_id',
        'residencia_cep',
        'residencia_complemento',
        'nacionalidade_id',
        'pais_id',
        'nis',
        'nascimento_municipio_id',
        'nascimento_estado_id',
        'relacao_parentesco_id',
        'foto_file_name',
        'foto_content_type',
        'foto_file_size',
        'foto_updated_at',
        'cartao_social',
        'usuario_cadastrante_id',
        'unidade_saude_cadastrante_id',
        'latitude',
        'longitude',
        'gmaps',
        'nome_social',
        'falecido',
        'inclusao_cadsus',
        'operacao_cadsus',
        'doador_sangue',
        'tipo_sanguineo_id',
        'mae_desconhecida',
        'etnia_indigena_id',
        'exportado_em',
        'situacao_rua',
        'possui_deficiencia',
        'matricula',
        'data_nascimento_responsavel',
        'codigo_cns_responsavel_legacy',
        'grau_parentesco_frequentado',
        'instituicao_acompanhamento',
        'referencia_familiar',
        'recebe_beneficio',
        'visita_familiar_frequente',
        'tempo_situacao_rua_id',
        'quantidade_alimentacao_id',
        'curso_id',
        'motivo_saida_cadastro_id',
        'orientacao_sexual_id',
        'comunidade_tradicional_nome',
        'relacao_parentesco_municipe_id',
        'mercado_trabalho_situacao_id',
        'frequenta_bezendeira',
        'participa_grupo_comunitario',
        'possui_plano_saude_privado',
        'internacao_12_meses',
        'internacao_12_meses_causa',
        'outra_condicao_1',
        'outra_condicao_2',
        'outra_condicao_3',
        'usa_plantas_medicinais',
        'plantas_medicinais_usadas',
        'dependente_alcool',
        'dependente_outras_drogas',
        'fumante',
        'gestante',
        'acamado',
        'domiciliado',
        'possui_diabetes',
        'possui_doenca_respiratoria',
        'possui_hanseniase',
        'possui_hipertensao_arterial',
        'possui_cancer',
        'possui_doencas_rins',
        'possui_tuberculose',
        'possui_avc_derrame',
        'possui_doenca_cardiaca',
        'possui_infarto',
        'tratamento_psiquico_ou_problema_mental',
        'usa_outras_praticas_integrativas_ou_complementares',
        'maternidade_referencia',
        'situacao_peso_id',
        'aceita_termo_recusa',
        'micro_area',
        'data_obito',
        'numero_do',
        'data_naturalizacao',
        'portaria_naturalizacao',
        'data_entrada_brasil',
        'fora_area',
        'outra_micro_area',
        'genero_sexual_id',
        'informar_genero_sexual',
        'informar_orientacao_sexual',
        'versao_esus',
        'ocupacao_cadastrante_id',
        'pai_desconhecido',
        'referencia',
        'relacao_parentesco_cuidador_id',
        'cns_cuidador',
        'fonetica_nome',
        'fonetica_nome_mae',
        'deleted_at',
        'participa_comunidade_tradicional',
        'acompanhado_por_instituicao',
        'possui_higiene_pessoal',
        '_id',
        'skip_exportacao',
        'esus_validacao_job_id',
        'unidade_saude_referencia_id',
        'equipe_id',
        'profissional_equipe_id',
        'genero_sexual_municipe_id',
        'orientacao_sexual_municipe_id',
        'esus_updated_at',
        'residencia_cep_buscado_webservice',
        'lock_version',
        'data_cadastro',
        'responsavel_id',
        'proprio_responsavel_familiar',
        'cartao_cidadao',
        'ref',
        'registro_principal',
        'unified_at',
    ];

    public function isPrincipal()
    {
        return (!empty($this->registro_principal));
    }

    public function getRef()
    {
        return $this->ref;
    }
}