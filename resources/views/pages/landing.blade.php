@extends('layouts.app')

@section('title', 'PRADANA NUSA ENERGI - Inspeksi & Sertifikasi Ketenagalistrikan SLO')

@section('content')
    <x-navbar />
    <x-hero :hero="$hero ?? null" />
    <x-profil-pradana :profil="$profilPradana ?? null" />
    <x-statistik-performa :statistik="$statistik ?? null" />
    <x-tentang-pradana :tentang="$tentangPradana ?? null" />
    <x-teknologi-terintegrasi :header="$teknologiHeader ?? null" :items="$teknologiItems ?? null" />
    <x-keunggulan-apc :header="$keunggulanHeader ?? null" :items="$keunggulanItems ?? null" />
    <x-energi-berkelanjutan :header="$energiHeader ?? null" :items="$energiItems ?? null" />
    <x-mengapa-pilih-pradana :header="$mengapaHeader ?? null" :items="$mengapaItems ?? null" />
    <x-kontak-kami :kontak="$kontakKami ?? null" />
    <x-footer />
@endsection