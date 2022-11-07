package br.com.eduardo.catholicinformation.ui.webclient

import android.util.Log
import br.com.eduardo.catholicinformation.model.Usuario
import br.com.eduardo.catholicinformation.ui.webclient.model.UsuarioRequisicao
import br.com.eduardo.catholicinformation.ui.webclient.services.UsuarioService

private const val TAG = "UsuarioWebClient"

class UsuarioWebClient {

    private val usuarioService: UsuarioService =
        RetrofitInicializador().usuarioService

    suspend fun buscaTodos(): List<Usuario>? {
        return try {
            val usuarioResposta = usuarioService
                .buscaTodosUsuario()
            usuarioResposta.map { usuarioResposta ->
                usuarioResposta.usuario
            }
        } catch (e: Exception) {
            Log.e(TAG, "buscaTodosUsuario: ", e)
            null
        }
    }

    suspend fun salva(usuario: UsuarioRequisicao): Boolean {
        try {
            val resposta = usuarioService.salva(usuario)
            return resposta.isSuccessful
        } catch (e: Exception) {
            Log.e(TAG, "salva: falha ao tentar se cadastrar", e)
        }
        return false

    }
}