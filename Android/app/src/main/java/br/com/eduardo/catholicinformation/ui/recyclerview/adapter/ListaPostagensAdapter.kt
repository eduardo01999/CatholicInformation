package br.com.eduardo.catholicinformation.ui.recyclerview.adapter

import android.content.Context
import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import br.com.eduardo.catholicinformation.databinding.PostagemItemBinding
import br.com.eduardo.catholicinformation.databinding.PostagemItemNewBinding
import br.com.eduardo.catholicinformation.model.Postagem
import br.com.eduardo.catholicinformation.ui.webclient.ipApi
import com.bumptech.glide.Glide

class ListaPostagensAdapter(
    private val context: Context,
    var quandoClicaNoItem: (postagem : Postagem) -> Unit = {},
    postagens: List<Postagem> = emptyList()
) : RecyclerView.Adapter<ListaPostagensAdapter.ViewHolder>() {

    private val postagens = postagens.toMutableList()

    override fun getItemCount(): Int = postagens.size

    fun atualiza(notas: List<Postagem>) {
        notifyItemRangeRemoved(0, this.postagens.size)
        this.postagens.clear()
        this.postagens.addAll(notas)
        notifyItemInserted(this.postagens.size)
    }


    class ViewHolder(
        private val binding: PostagemItemNewBinding,
        private val quandoClicaNoItem: (postagem: Postagem) -> Unit
    ) : RecyclerView.ViewHolder(binding.root) {

        private lateinit var postagem: Postagem

        init {
            itemView.setOnClickListener {
                if (::postagem.isInitialized) {
                    quandoClicaNoItem(postagem)
                }
            }
        }

        fun vincula(postagem: Postagem) {
            this.postagem = postagem
            val imagemPostagem = binding.imageParoquia
            val url = "http://"+ ipApi +"/CatholicInformation/Web" + postagem.path_postagem.replace("..","")

            Glide
                .with(itemView.context)
                .load(url)
                .centerCrop()
                .into(imagemPostagem)


            binding.postagemItemNomeParoquia.text = postagem.paroquia
            binding.postagemItemDescricao.text = postagem.descricao
        }
    }

    override fun onCreateViewHolder(
        parent: ViewGroup,
        viewType: Int
    ): ViewHolder =
        ViewHolder(
            PostagemItemNewBinding
                .inflate(
                    LayoutInflater.from(context)
                ),
            quandoClicaNoItem
        )

    override fun onBindViewHolder(
        holder: ViewHolder,
        position: Int
    ) {
        holder.vincula(postagens[position])
    }
}