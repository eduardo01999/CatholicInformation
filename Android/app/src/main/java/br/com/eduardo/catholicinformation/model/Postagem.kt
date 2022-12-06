package br.com.eduardo.catholicinformation.model

import android.os.Parcelable
import androidx.room.Entity
import androidx.room.PrimaryKey
import kotlinx.android.parcel.Parcelize

@Entity
@Parcelize
data class Postagem (
    @PrimaryKey
    val id: Int,
    val id_paroquia: Int,
    val descricao: String,
    val path_postagem: String,
    val data_inclusao: String,
    val extensao: String,
    val path_paroquia: String,
    val paroquia: String
): Parcelable