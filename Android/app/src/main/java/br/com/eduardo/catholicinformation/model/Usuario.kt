package br.com.eduardo.catholicinformation.model

import androidx.room.Entity
import androidx.room.PrimaryKey
import java.util.*

@Entity
data class Usuario (
    @PrimaryKey
    val id: Int,
    val nome : String,
    val email: String,
    val senha: String,
    val telefone: String,
    val estado: String,
    val cidade: String,
    val id_paroquia: Int
)