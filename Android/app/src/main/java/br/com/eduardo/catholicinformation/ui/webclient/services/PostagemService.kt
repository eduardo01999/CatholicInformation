package br.com.eduardo.catholicinformation.ui.webclient.services

import br.com.eduardo.catholicinformation.ui.webclient.model.PostagemResposta
import retrofit2.http.GET
import retrofit2.http.Path

interface PostagemService {

    @GET("postagem")
    suspend fun buscaTodasPostagens(): List<PostagemResposta>

    //BUSCA POR ID DA PAROQUIA
    @GET("postagem/{id}")
    suspend fun buscaPorId(@Path("id") id:Int
    ): List<PostagemResposta>

    //BUSCA POR ID DA POSTAGEM
    @GET("postagemselecionada/{id}")
    suspend fun buscaPostagemSelecionada(@Path("id") id:Int
    ): List<PostagemResposta>
}
