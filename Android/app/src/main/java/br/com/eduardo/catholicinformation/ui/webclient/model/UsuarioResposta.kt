package br.com.eduardo.catholicinformation.ui.webclient.model

import br.com.eduardo.catholicinformation.model.Usuario

class UsuarioResposta (
    val id: Int?,
    val nome : String,
    val email: String,
    val senha: String,
    val telefone: String,
    val estado: String,
    val cidade: String,
    val id_paroquia: Int
 ) {

    val usuario: Usuario get() = Usuario(
        id = id ?: 0,
        nome = nome ?: "",
        email = email ?: "",
        senha = senha ?: "",
        telefone = telefone ?: "",
        estado = estado ?: "",
        cidade = cidade ?: "",
        id_paroquia = id_paroquia ?: 0
    )

}