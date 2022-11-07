package br.com.eduardo.catholicinformation.ui.webclient.model

import br.com.eduardo.catholicinformation.model.Postagem

class PostagemResposta (
    val id: Int,
    val id_paroquia: Int,
    val descricao: String,
    val path_postagem: String,
    val data_inclusao: String,
    val extensao: String,
    val path_paroquia: String,
    val paroquia: String
) {
    val postagem: Postagem
    get() = Postagem(
        id = id?: 0,
        id_paroquia = id_paroquia?: 0,
        descricao = descricao?: "",
        path_postagem = path_postagem?: "",
        data_inclusao = data_inclusao?: "",
        extensao = extensao?: "",
        path_paroquia = path_paroquia?: "",
        paroquia = paroquia?: ""
    )
}