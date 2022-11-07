package br.com.eduardo.catholicinformation.ui.activity

import android.os.Bundle
import androidx.lifecycle.lifecycleScope
import br.com.eduardo.catholicinformation.databinding.ActivityLoginBinding
import kotlinx.coroutines.launch
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.lifecycleScope
import br.com.eduardo.catholicinformation.databinding.ActivityListaPostagemActivityBinding
import br.com.eduardo.catholicinformation.extensions.toast
import br.com.eduardo.catholicinformation.extensions.vaiPara
import br.com.eduardo.catholicinformation.model.Postagem
import br.com.eduardo.catholicinformation.model.Usuario
import br.com.eduardo.catholicinformation.ui.webclient.RetrofitInicializador
import br.com.eduardo.catholicinformation.ui.webclient.UsuarioWebClient
import br.com.eduardo.catholicinformation.ui.webclient.model.UsuarioResposta
import br.com.eduardo.catholicinformation.ui.webclient.services.PostagemService
import br.com.eduardo.catholicinformation.ui.webclient.services.UsuarioService
import kotlinx.coroutines.launch

class LoginActivity : AppCompatActivity() {

    private val binding by lazy {
        ActivityLoginBinding.inflate(layoutInflater)
    }

//    private val usuarioDao by lazy {
//        AppDatabase.instancia(this).usuarioDao()
//    }

    private val usuarioService by lazy {
        UsuarioWebClient()
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)
        configuraBotaoCadastrar()
        configuraBotaoEntrar()
    }

    private fun configuraBotaoEntrar() {
        binding.activityLoginBotaoEntrar.setOnClickListener {
            val login = binding.activityLoginUsuario.text.toString()
            val senha = binding.activityLoginSenha.text.toString()
//            autentica(login,senha)
            vaiPara(ListaPostagensActivity::class.java)
        }
    }

    private fun autentica(login: String, senha: String) {
        lifecycleScope.launch {
            usuarioService.buscaTodos().let { usuario ->

            }
            vaiPara(ListaPostagensActivity::class.java)
            finish()

//            UsuarioService.buscaTodosUsuario(usuario, senha)?.let { usuario ->
//                dataStore.edit { preferences ->
//                    preferences[usuarioLogadoPreferences] = usuario.id
//                }
//                vaiPara(ListaPostagensActivity::class.java)
//                finish()
//            } ?: toast("Falha na autenticação")
        }
    }

    private fun configuraBotaoCadastrar() {
        binding.activityLoginBotaoCadastrar.setOnClickListener {
            vaiPara(FormularioCadastroUsuarioActivity::class.java)
        }
    }
}