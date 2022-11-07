package br.com.eduardo.catholicinformation.repository

import br.com.eduardo.catholicinformation.ui.webclient.UsuarioWebClient
import br.com.eduardo.catholicinformation.ui.webclient.model.UsuarioRequisicao


class CadastroRepository (private val webClient: UsuarioWebClient) {

    suspend fun cadastroUsuario(usuario : UsuarioRequisicao): Boolean {
        return webClient.salva(usuario)
    }
}