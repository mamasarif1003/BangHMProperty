<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($katproduk as $content)
    <url>
        <loc>{{ url('/') }}/kategori/produk/{{ $content->slug }}</loc>
    </url>
    @endforeach
</urlset>
