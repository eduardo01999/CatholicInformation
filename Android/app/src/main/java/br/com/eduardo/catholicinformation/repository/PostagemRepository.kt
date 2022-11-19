package br.com.eduardo.catholicinformation.repository

import br.com.eduardo.catholicinformation.model.Postagem
import br.com.eduardo.catholicinformation.ui.webclient.PostagemWebClient

class PostagemRepository (private val webClient: PostagemWebClient) {

    suspend fun buscaPorId(): List<Postagem>? {
        return webClient.buscaPorId()
    }

    suspend fun buscaTodas() {
        webClient.buscaPorId()
    }

    suspend fun buscaPostagemSelecionada(): List<Postagem>? {
        return webClient.buscaPostagemSelecionada()
    }
}