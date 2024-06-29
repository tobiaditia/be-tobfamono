<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute harus diterima.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus berupa tanggal setelah :date.',
    'after_or_equal' => ':attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha' => ':attribute hanya dapat berisi huruf.',
    'alpha_dash' => ':attribute hanya dapat berisi huruf, angka, tanda hubung dan garis bawah.',
    'alpha_num' => ':attribute hanya dapat berisi huruf dan angka.',
    'array' => ':attribute harus berupa array.',
    'before' => ':attribute harus tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file' => ':attribute harus antara :min dan :max kilobytes.',
        'string' => ':attribute harus antara :min dan :max characters.',
        'array' => ':attribute harus antara :min dan :max items.',
    ],
    'boolean' => ':attribute harus benar atau salah.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_equals' => ':attribute harus sama dengan tanggal :date.',
    'date_format' => ':attribute tidak cocok dengan format :format.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus :digits digit.',
    'digits_between' => ':attribute harus diantara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => ':attribute memiliki nilai duplikat.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'ends_with' => ':attribute harus diakhiri dengan salah satu following: :values',
    'exists' => ':attribute yang dipilih tidak valid.',
    'file' => ':attribute harus berupa file.',
    'filled' => ':attribute harus terisi.',
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file' => ':attribute harus lebih besar dari :value kilobyte.',
        'string' => ':attribute harus lebih besar dari :value karakter.',
        'array' => ':attribute harus lebih besar dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'file' => ':attribute harus lebih besar atau sama dengan :value kilobyte.',
        'string' => ':attribute harus lebih besar atau sama dengan :value karakter.',
        'array' => ':attribute harus :value item atau lebih.',
    ],
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => ':attribute tidak ada di :other.',
    'integer' => ':attribute harus berupa integer.',
    'ip' => ':attribute harus alamat IP yang valid.',
    'ipv4' => ' harus alamat IPv4 yang valid.',
    'ipv6' => ' harus alamat IPv6 yang valid.',
    'json' => ' harus berupa JSON string yang valid.',
    'lt' => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file' => ':attribute harus kurang dari :value kilobyte.',
        'string' => ':attribute harus kurang dari :value karakter.',
        'array' => ':attribute harus kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus kurang atau sama dengan :value.',
        'file' => ':attribute harus kurang atau sama dengan :value kilobyte.',
        'string' => ':attribute harus kurang atau sama dengan :value karakter.',
        'array' => ':attribute harus tidak lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute harus tidak lebih dari :max.',
        'file' => ':attribute harus tidak lebih dari :max kilobyte.',
        'string' => ':attribute harus tidak lebih dari :max karakter.',
        'array' => ':attribute harus tidak lebih dari :max item.',
    ],
    'mimes' => ':attribute harus file type: :values.',
    'mimetypes' => ':attribute harus file type: :values.',
    'min' => [
        'numeric' => ':attribute minimal :min.',
        'file' => ':attribute minimal :min kilobyte.',
        'string' => ':attribute minimal :min karakter.',
        'array' => ':attribute minimal :min item.',
    ],
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => ':attribute format tidak valid.',
    'numeric' => ':attribute harus berupa nomor.',
    'present' => ':attribute harus ada.',
    'regex' => ':attribute format tidak valid.',
    'required' => ':attribute diperlukan.',
    'required_if' => ':attribute wajib diisi saat :other adalah :value.',
    'required_unless' => ':attribute wajib diisi kecuali :other dalam :values.',
    'required_with' => ':attribute wajib diisi saat :values ada.',
    'required_with_all' => ':attribute wajib diisi saat :values ada.',
    'required_without' => ':attribute wajib diisi saat :values tidak ada.',
    'required_without_all' => ':attribute diperlukan jika tidak ada :values.',
    'same' => ':attribute dan :other harus sama.',
    'size' => [
        'numeric' => ':attribute harus :size.',
        'file' => ':attribute harus :size kilobyte.',
        'string' => ':attribute harus :size karakter.',
        'array' => ':attribute harus mengandung :size item.',
    ],
    'starts_with' => ':attribute harus dimulai dengan :values',
    'string' => ':attribute harus berupa string.',
    'timezone' => ':attribute harus zona yang valid.',
    'unique' => ':attribute sudah digunakan.',
    'unique_password' => 'Silakan gunakan :attribute yang berbeda dengan password Anda sebelumnya.',
    'uploaded' => ':attribute gagal diupload.',
    'url' => 'Format :attribute bukan url yang valid.',
    'uuid' => ':attribute harus UUID yang valid.',
    'file_exists' => 'File yang ditentukan oleh :attribute tidak ada.',
    'wrong_credential' => 'Email atau password salah.'
];
