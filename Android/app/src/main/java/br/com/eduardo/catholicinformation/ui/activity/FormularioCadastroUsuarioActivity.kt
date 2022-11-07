package br.com.eduardo.catholicinformation.ui.activity

import android.os.Bundle
import android.util.Log
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.Lifecycle
import androidx.lifecycle.lifecycleScope
import androidx.lifecycle.repeatOnLifecycle
import br.com.eduardo.catholicinformation.databinding.ActivityFormularioCadastroUsuarioBinding
import br.com.eduardo.catholicinformation.repository.CadastroRepository
import br.com.eduardo.catholicinformation.repository.PostagemRepository
import br.com.eduardo.catholicinformation.ui.webclient.PostagemWebClient
import br.com.eduardo.catholicinformation.ui.webclient.UsuarioWebClient
import br.com.eduardo.catholicinformation.ui.webclient.model.UsuarioRequisicao
import kotlinx.coroutines.launch

class FormularioCadastroUsuarioActivity : AppCompatActivity() {

    private val binding by lazy {
        ActivityFormularioCadastroUsuarioBinding.inflate(layoutInflater)
    }

    private val repository by lazy {
        CadastroRepository(
            UsuarioWebClient()
        )
    }

//    private val dao by lazy {
//        AppDatabase.instancia(this).usuarioDao()
//    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        binding.activityFormularioCadastroBotaoCadastrar.setOnClickListener {
            lifecycleScope.launch {
                cadastro()
            }
        }
    }

    private fun validarForm() : Boolean {
        return !binding.activityFormularioCadastroEmail.text.isNullOrEmpty() ||
                binding.activityFormularioCadastroNome.text.isNullOrEmpty() ||
                binding.activityFormularioCadastroSenha.text.isNullOrEmpty() ||
                binding.activityFormularioCadastroConfirmaSenha.text.isNullOrEmpty() ||
                binding.activityFormularioCadastroTelefone.text.isNullOrEmpty()
    }

    private suspend fun cadastro() {
        val usuario = UsuarioRequisicao(
            nome = binding.activityFormularioCadastroNome.text.toString(),
            email = binding.activityFormularioCadastroEmail.text.toString(),
            senha = binding.activityFormularioCadastroSenha.text.toString(),
            telefone = binding.activityFormularioCadastroTelefone.text.toString(),
            estado = "",
            cidade = "",
            id_paroquia = 8
        )
        repository.cadastroUsuario(usuario)
    }

}