<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use SoftDeletes;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('municipes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_cns', 25)->nullable();
            $table->string('cartao_provisorio', 25)->nullable();
            $table->string('nome', 100)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->integer('sexo_id')->nullable();
            $table->string('nome_mae', 100)->nullable();
            $table->string('nome_pai', 100)->nullable();
            $table->string('nome_responsavel', 100)->nullable();
            $table->integer('ocupacao_id')->nullable();
            $table->boolean('frequenta_escola')->nullable();
            $table->integer('raca_cor_id')->nullable();
            $table->integer('grau_escolaridade_id')->nullable();
            $table->integer('permanencia_id')->nullable();
            $table->string('tempo_municipio', 50)->nullable();
            $table->date('reside_desde')->nullable();
            $table->integer('estado_civil_id')->nullable();
            $table->string('telefone_celular', 14)->nullable();
            $table->string('telefone_residencial', 14)->nullable();
            $table->string('telefone_comercial', 14)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('identidade_numero', 20)->nullable();
            $table->integer('identidade_orgao_emissor_id')->nullable();
            $table->integer('identidade_estado_id')->nullable();
            $table->date('identidade_data_emissao')->nullable();
            $table->string('titulo_eleitor_numero', 14)->nullable();
            $table->string('titulo_eleitor_zona', 5)->nullable();
            $table->string('titulo_eleitor_secao', 5)->nullable();
            $table->string('cpf_numero')->nullable();
            $table->integer('tipo_logradouro_id')->nullable();
            $table->string('residencia_logradouro', 100)->nullable();
            $table->string('residencia_numero', 50)->nullable();
            $table->string('residencia_bairro', 100)->nullable();
            $table->integer('residencia_municipio_id')->nullable();
            $table->integer('residencia_estado_id')->nullable();
            $table->string('residencia_cep', 9)->nullable();
            $table->string('residencia_complemento', 100)->nullable();
            $table->integer('nacionalidade_id')->nullable();
            $table->integer('pais_id')->nullable();
            $table->string('nis', 11)->nullable();
            $table->integer('nascimento_municipio_id')->nullable();
            $table->integer('nascimento_estado_id')->nullable();
            $table->integer('relacao_parentesto_id')->nullable();
            $table->timestamps();
            $table->string('foto_file_name')->nullable();
            $table->string('foto_content_type')->nullable();
            $table->integer('foto_file_size')->nullable();
            $table->timestamp('foto_update_at')->nullable();
            $table->string('cartao_social', 50)->nullable();
            $table->integer('usuario_cadastrante_id')->nullable();
            $table->integer('unidade_saude_cadastrante_id')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->boolean('gmaps')->nullable();
            $table->string('nome_social', 100)->nullable();
            $table->boolean('falecido')->default(false)->nullable();
            $table->timestamp('inclusao_cadsus')->nullable();
            $table->timestamp('operacao_cadsus')->nullable();
            $table->boolean('doador_sangue')->default(false)->nullable();
            $table->integer('tipo_sanguineo_id')->nullable();
            $table->boolean('mae_desconhecida')->default(false)->nullable();
            $table->boolean('etnia_indigena_id')->nullable();
            $table->timestamp('exportado_em')->nullable();
            $table->boolean('situacao_rua')->nullable();
            $table->boolean('possui_deficiencia')->nullable();
            $table->integer('matricula')->nullable();
            $table->date('data_nascimento_responsavel')->nullable();
            $table->string('codigo_cns_reponsavel_legacy', 25)->nullable();
            $table->string('grau_parentesco_frequentado', 100)->nullable();
            $table->string('instituicao_acompanhamento', 100)->nullable();
            $table->boolean('referencia_familiar')->nullable();
            $table->boolean('recebe_beneficio')->nullable();
            $table->boolean('visita_familiar_frequente')->nullable();
            $table->integer('tempo_situacao_rua_id')->nullable();
            $table->integer('quantidade_alimentacao_id')->nullable();
            $table->integer('curso_id')->nullable();
            $table->integer('motivo_saida_cadastro_id')->nullable();
            $table->integer('orientacao_sexual_id')->nullable();
            $table->string('comunidade_tradicional_nome', 100)->nullable();
            $table->integer('relacao_parentesco_municipe_id')->nullable();
            $table->integer('mercado_trabalho_situacao_id')->nullable();
            $table->boolean('frequenta_bezendeira')->nullable();
            $table->boolean('participa_grupo_comunitario')->nullable();
            $table->boolean('possui_plano_saude_privado')->nullable();
            $table->boolean('internacao_12_meses')->nullable();
            $table->string('internacao_12_meses_causa', 100)->nullable();
            $table->string('outra_condicao_1', 100)->nullable();
            $table->string('outra_condicao_2', 100)->nullable();
            $table->string('outra_condicao_3', 100)->nullable();
            $table->boolean('usa_plantas_medicionais')->nullable();
            $table->string('plantas_medicionais_usadas', 100)->nullable();
            $table->boolean('dependente_alcool')->nullable();
            $table->boolean('dependente_outras_drogas')->nullable();
            $table->boolean('fumante')->nullable();
            $table->boolean('gestante')->nullable();
            $table->boolean('acamado')->nullable();
            $table->boolean('domiciliado')->nullable();
            $table->boolean('possui_diabetes')->nullable();
            $table->boolean('possui_doenca_respiratoria')->nullable();
            $table->boolean('possui_hanseniase')->nullable();
            $table->boolean('possui_hipertensao_arterial')->nullable();
            $table->boolean('possui_cancer')->nullable();
            $table->boolean('possui_doenca_rins')->nullable();
            $table->boolean('possui_tuberculose')->nullable();
            $table->boolean('possui_avc_derrame')->nullable();
            $table->boolean('possui_doenca_cardiaca')->nullable();
            $table->boolean('possui_infarto')->nullable();
            $table->boolean('tratamento_psiquico_ou_problema_mental')->nullable();
            $table->boolean('usa_outras_praticas_integrativas_ou_complementares')->nullable();
            $table->string('maternidade_referencia', 100)->nullable();
            $table->integer('situacao_peso_id')->nullable();
            $table->boolean('aceita_termo_recusa')->nullable();
            $table->integer('micro_area')->nullable();
            $table->date('data_obito')->nullable();
            $table->string('numero_do', 100)->nullable();
            $table->date('data_naturalizacao')->nullable();
            $table->string('portaria_naturalizacao', 16)->nullable();
            $table->date('data_entrada_brasil')->nullable();
            $table->boolean('fora_area')->default(false)->nullable();
            $table->string('outra_micro_area', 2)->nullable();
            $table->integer('genero_sexual_id')->nullable();
            $table->boolean('informar_genero_sexual')->nullable();
            $table->boolean('informar_orientacao_sexual')->nullable();
            $table->string('versao_esus', 10)->nullable();
            $table->integer('ocupacao_cadastrante_id')->nullable();
            $table->boolean('pai_desconhecido')->nullable();
            $table->string('referencia', 100)->nullable();
            $table->integer('relacao_parentesco_cuidador_id')->nullable();
            $table->string('cns_cuidador', 25)->nullable();
            $table->string('fonetica_nome', 100)->nullable();
            $table->string('fonetica_nome_mae', 100)->nullable();
            $table->softDeletes();
            $table->boolean('participa_comunidade_tradicional')->nullable();
            $table->boolean('acompanhado_por_instituicao')->default(false)->nullable();
            $table->boolean('possui_higiene_pessoal')->default(false)->nullable();
            $table->bigInteger('_id')->nullable();
            $table->boolean('skip_exportacao')->default(false)->nullable();
            $table->string('esus_validacao_job_id')->nullable();
            $table->integer('unidade_saude_referencia_id')->nullable();
            $table->integer('equipe_id')->nullable();
            $table->integer('profissional_equipe_id')->nullable();
            $table->integer('genero_sexual_municipe_id')->nullable();
            $table->integer('orientacao_sexual_municipe_id')->nullable();
            $table->date('esus_update_at')->nullable();
            $table->boolean('residencia_cep_buscado_webservice')->default(false)->nullable();
            $table->integer('lock_version')->default(0)->nullable();
            $table->date('data_cadastro')->nullable();
            $table->integer('responsavel_id')->nullable();
            $table->boolean('proprio_responsavel_familiar')->default(false)->nullable();
            $table->string('cartao_cidadao', 19)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipes');
    }
};
