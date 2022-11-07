package br.com.eduardo.catholicinformation.ui.webclient

import br.com.eduardo.catholicinformation.ui.webclient.services.PostagemService
import br.com.eduardo.catholicinformation.ui.webclient.services.UsuarioService
import retrofit2.Retrofit
import retrofit2.converter.moshi.MoshiConverterFactory

class RetrofitInicializador {

    private val retrofit: Retrofit = Retrofit.Builder()
        .baseUrl("http://10.0.0.102/apiCatholicInformation/public_html/api/")
        .addConverterFactory(MoshiConverterFactory.create())
        .build()

    val usuarioService = retrofit.create(UsuarioService::class.java)
    val postagemService = retrofit.create(PostagemService::class.java)
}