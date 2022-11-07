package br.com.eduardo.catholicinformation.ui.webclient.model

data class PostagemRequisicao (
    val id_paroquia: Int,
    val descricao: String,
    val path_postagem: String,
    val data_inclusao: String,
    val extensao: String,
    val path_paroquia: String,
    val paroquia: String
)