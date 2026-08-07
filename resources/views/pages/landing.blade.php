@extends('layouts.app')

@section('title', (isset($logos) && $logos->count() > 0 ? ($logos->first()->nama ?? 'PRADANA NUSA ENERGI') : 'PRADANA NUSA ENERGI') . ' - Inspeksi & Sertifikasi Ketenagalistrikan SLO')

@php
    $__env->share('logos', $logos ?? null);
@endphp

@section('content')
    <x-navbar :logos="$logos ?? null" />
    <x-hero :hero="$hero ?? null" />
    <x-tentang-pradana :tentang="$tentangPradana ?? null" />
    <x-teknologi-terintegrasi :header="$teknologiHeader ?? null" :items="$teknologiItems ?? null" />
    <x-keunggulan-apc :header="$keunggulanHeader ?? null" :items="$keunggulanItems ?? null" />
    <x-akreditasi-resmi :akreditasi="$akreditasi ?? null" />
    <x-sertifikat-penilaian-kinerja :sertifikat-kinerja="$sertifikatKinerja ?? null" />
    <x-energi-berkelanjutan :header="$energiHeader ?? null" :items="$energiItems ?? null" :clients="$clientPhotos ?? null" />
    <x-mengapa-pilih-pradana :header="$mengapaHeader ?? null" :items="$mengapaItems ?? null" />
    <x-kontak-kami :kontak="$kontakKami ?? null" />
    <x-footer />
@endsection