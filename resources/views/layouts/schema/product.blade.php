<script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "Product",
    "name": "{{$name}}",
    "image": "{{$image}}",
    "description": "{{$description}}",
    "sku": "{{$sku}}",
    "mpn": "{{$mpn}}",
    "brand": {
      "@type": "Brand",
      "name": "{{config('app.name')}}"
    },
    "review": {
      "@type": "Review",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
      },
      "author": {
        "@type": "Person",
        "name": "incognito"
      }
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "{{$rating->rating}}",
      "bestRating": "5",
      "worstRating": "1",
      "ratingCount" : "{{$rating->count}}"
    },
    "offers": {
      "@type": "Offer",
      "url": "{{route('page', $page->slug)}}",
      "priceCurrency": "UAH",
      "price": "{{$price}}",
      "priceValidUntil": "{{$date}}",
      "itemCondition": "https://schema.org/UsedCondition",
      "availability": "https://schema.org/InStock"
    },
    "seller": {
      "@type": "Organization",
      "name": "{{config('app.name')}}"
    }
  }
</script>
