@extends('layouts.app')

@section('title', 'SLO Pradana | PRADANA NUSA ENERGI - Inspeksi & Sertifikasi Ketenagalistrikan')
@section('meta_description', 'SLO Pradana - PRADANA NUSA ENERGI menyediakan layanan inspeksi dan Sertifikasi Laik Operasi (SLO) ketenagalistrikan yang profesional, terpercaya, dan sesuai ketentuan yang berlaku.')

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