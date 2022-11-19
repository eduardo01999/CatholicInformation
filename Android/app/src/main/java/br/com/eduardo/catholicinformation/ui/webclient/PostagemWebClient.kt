package br.com.eduardo.catholicinformation.ui.webclient

import android.util.Log
import br.com.eduardo.catholicinformation.model.Postagem
import br.com.eduardo.catholicinformation.model.Usuario
import br.com.eduardo.catholicinformation.ui.webclient.model.PostagemResposta
import br.com.eduardo.catholicinformation.ui.webclient.services.PostagemService
import br.com.eduardo.catholicinformation.ui.webclient.services.UsuarioService

private const val TAG = "PostagemWebClient"

class PostagemWebClient {
    private val postagemService: PostagemService =
        RetrofitInicializador().postagemService

    suspend fun buscaTodas(): List<Postagem>? {
        return try {
            val postagemResposta = postagemService
                .buscaTodasPostagens()
            postagemResposta.map { postagemResposta ->
                postagemResposta.postagem
            }
        } catch (e: Exception) {
            Log.e(TAG, "buscaTodasPostagens: ", e)
            null
        }
    }

    suspend fun buscaPorId(): List<Postagem>? {
        return try {
            val postagemResposta = postagemService
                .buscaPorId(8)
            postagemResposta.map { postagemResposta ->
                Log.i(TAG,"teste ${postagemResposta.descricao}")
                postagemResposta.postagem
            }
        } catch (e: Exception) {
            Log.e(TAG, "buscaTodasPostagens: ", e)
            null
        }
    }

    suspend fun buscaPostagemSelecionada(): List<Postagem>? {
        return try {
            val postagemResposta = postagemService
                .buscaPostagemSelecionada(1)
            postagemResposta.map { postagemResposta ->
                Log.i(TAG,"teste ${postagemResposta.descricao}")
                postagemResposta.postagem
            }
        } catch (e: Exception) {
            Log.e(TAG, "buscaTodasPostagens: ", e)
            null
        }
    }
}