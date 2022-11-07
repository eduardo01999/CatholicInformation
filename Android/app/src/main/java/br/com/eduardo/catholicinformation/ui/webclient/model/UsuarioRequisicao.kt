package br.com.eduardo.catholicinformation.ui.webclient.model

data class UsuarioRequisicao (
    val nome : String,
    val email: String,
    val senha: String,
    val telefone: String,
    val estado: String,
    val cidade: String,
    val id_paroquia: Int
)