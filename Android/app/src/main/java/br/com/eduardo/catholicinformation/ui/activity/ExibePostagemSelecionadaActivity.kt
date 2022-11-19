package br.com.eduardo.catholicinformation.ui.activity

import android.os.Bundle
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.lifecycleScope
import br.com.eduardo.catholicinformation.databinding.ActivityExibePostagemBinding
import br.com.eduardo.catholicinformation.ui.webclient.RetrofitInicializador
import br.com.eduardo.catholicinformation.ui.webclient.ipApi
import br.com.eduardo.catholicinformation.ui.webclient.services.PostagemService
import com.bumptech.glide.Glide
import kotlinx.coroutines.launch


class ExibePostagemSelecionadaActivity : AppCompatActivity() {

    private val TAG = "ExibePostagemSelecionada"

    private val binding by lazy {
        ActivityExibePostagemBinding.inflate(layoutInflater)
    }


    private val postagemService: PostagemService =
        RetrofitInicializador().postagemService


    private var postagemId: Int? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)
        lifecycleScope.launch {
            launch {
                tentaBuscarPostagem()
            }
        }
    }

    private suspend fun tentaBuscarPostagem() {
        postagemId?.let { id ->
            //AQUI ESTA COM ERRO NÃO SEI COMO FAZER ENTRAR NO FOREACH
            // (ACHO QUE DEVIA USAR OUTRA COISA, MAS NÃO SEI O QUE)
            postagemService.buscaPostagemSelecionada(id)
                .forEach { postagemEncontrada ->
                    postagemId = postagemEncontrada.id

                    val imagemPostagem = binding.postagemImagem
                    val imagemParoquia = binding.imageParoquia
                    val urlPostagem = "http://"+ ipApi + "/CatholicInformation/Web" + postagemEncontrada.path_postagem.replace("..","")
                    val urlParoquia = "http://"+ ipApi + "/CatholicInformation/Web" + postagemEncontrada.path_paroquia.replace("..","")

//                    Glide
//                        .with(itemView.context)
//                        .load(urlPostagem)
//                        .centerCrop()
//                        .into(imagemPostagem)
//
//                    Glide
//                        .with(itemView.context)
//                        .load(urlParoquia)
//                        .centerCrop()
//                        .into(imagemParoquia)

                    binding.postagemNomeParoquia.setText(postagemEncontrada.paroquia)
                    binding.dataPublicacao.setText(postagemEncontrada.data_inclusao)
                    binding.descricaoPostagem.setText(postagemEncontrada.descricao)
                    Log.i("tentaBuscarPost", "tentaBuscarPostagem: " + postagemEncontrada.descricao)
                }
        }
    }
}
