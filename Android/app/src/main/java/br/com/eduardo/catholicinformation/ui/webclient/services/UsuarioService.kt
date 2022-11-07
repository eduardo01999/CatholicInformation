package br.com.eduardo.catholicinformation.ui.webclient.services

import br.com.eduardo.catholicinformation.model.Usuario
import br.com.eduardo.catholicinformation.ui.webclient.model.PostagemResposta
import br.com.eduardo.catholicinformation.ui.webclient.model.UsuarioRequisicao
import br.com.eduardo.catholicinformation.ui.webclient.model.UsuarioResposta
import kotlinx.coroutines.flow.Flow
import retrofit2.Response
import retrofit2.http.*

interface UsuarioService {

    @GET("fiel")
    suspend fun buscaTodosUsuario(): List<UsuarioResposta>


    @GET("fiel/{id}")
    suspend fun buscaPorId(@Path("id") id:Int,
                           @Body usuario: UsuarioRequisicao): List<UsuarioResposta>

    @POST("fiel")
    suspend fun salva(@Body usuario: UsuarioRequisicao): Response<UsuarioRequisicao>

}