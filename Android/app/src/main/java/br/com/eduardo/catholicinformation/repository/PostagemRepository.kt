package br.com.eduardo.catholicinformation.repository

import br.com.eduardo.catholicinformation.model.Postagem
import br.com.eduardo.catholicinformation.ui.webclient.PostagemWebClient

class PostagemRepository (private val webClient: PostagemWebClient) {

    suspend fun buscaPorId(id: Int): List<Postagem>? {
        return webClient.buscaPorId(id)
    }

    suspend fun buscaTodas(id: Int) {
        webClient.buscaPorId(id)
    }

    suspend fun buscaPostagemSelecionada(): List<Postagem>? {
        return webClient.buscaPostagemSelecionada()
    }
}