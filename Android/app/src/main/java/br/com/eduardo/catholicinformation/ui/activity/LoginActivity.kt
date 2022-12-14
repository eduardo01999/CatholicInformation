package br.com.eduardo.catholicinformation.ui.activity

import android.content.Intent
import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.lifecycleScope
import br.com.eduardo.catholicinformation.databinding.ActivityLoginBinding
import br.com.eduardo.catholicinformation.extensions.vaiPara
import br.com.eduardo.catholicinformation.ui.webclient.UsuarioWebClient
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
            autentica(login,senha)
//            vaiPara(ListaPostagensActivity::class.java)
        }
    }

    private fun autentica(login: String, senha: String) {
        lifecycleScope.launch {

            if (login.isNotEmpty() || senha.isNotEmpty()) {
                usuarioService.buscaTodos().let { usuario ->

                    usuario?.forEach { user ->
                        if (user.email == login) {
                            if (user.senha == senha) {

                                val it = Intent(applicationContext, ListaPostagensActivity::class.java)
                                it.putExtra("ID", user.id_paroquia)
                                startActivity(it)
//                                vaiPara(ListaPostagensActivity::class.java)
                                finish()
                            }
                        }
                    }
                    //informar erro no login
//                    Toast.makeText(applicationContext, "login/senha incorreto", Toast.LENGTH_SHORT).show()
                }
            }


//            UsuarioService.buscaTodosUsuario(usuario, senha)?.let { usuario ->
//                dataStore.edit { preferences ->
//                    preferences[usuarioLogadoPreferences] = usuario.id
//                }
//                vaiPara(ListaPostagensActivity::class.java)
//                finish()
//            } ?: toast("Falha na autentica????o")
        }
    }

    private fun configuraBotaoCadastrar() {
        binding.activityLoginBotaoCadastrar.setOnClickListener {
            vaiPara(FormularioCadastroUsuarioActivity::class.java)
        }
    }
}