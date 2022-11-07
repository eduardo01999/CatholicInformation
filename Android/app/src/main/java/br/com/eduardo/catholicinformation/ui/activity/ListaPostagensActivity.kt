package br.com.eduardo.catholicinformation.ui.activity

import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.Lifecycle
import androidx.lifecycle.lifecycleScope
import androidx.lifecycle.repeatOnLifecycle
import br.com.eduardo.catholicinformation.databinding.ActivityListaPostagemActivityBinding
import br.com.eduardo.catholicinformation.repository.PostagemRepository
import br.com.eduardo.catholicinformation.ui.recyclerview.adapter.ListaPostagensAdapter
import br.com.eduardo.catholicinformation.ui.webclient.PostagemWebClient
import kotlinx.coroutines.launch

class ListaPostagensActivity : AppCompatActivity() {
    private val binding by lazy {
        ActivityListaPostagemActivityBinding.inflate(layoutInflater)
    }

    private val adapter by lazy {
        ListaPostagensAdapter(this)
    }

    private val repository by lazy {
        PostagemRepository(
            PostagemWebClient()
        )
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(binding.root)
        configuraRecyclerView()
        lifecycleScope.launch {
            repeatOnLifecycle(Lifecycle.State.STARTED) {
                buscaPostagens()
            }
        }
    }

    private fun configuraRecyclerView() {
        binding.activityListaPostagensRecyclerView.adapter = adapter
    }

    private suspend fun buscaPostagens() {
        repository.buscaPorId()?.let { adapter.atualiza(it) }
    }
}