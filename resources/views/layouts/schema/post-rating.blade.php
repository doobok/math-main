
<script type="application/ld+json">
  {
    "@context" : "https://schema.org/",
    "@type": "AggregateRating",
    "itemReviewed": {
      "@type": "Organization",
      "name" : "{{$page->getTranslatedAttribute('h1')}}"
    },
    "ratingValue": "{{$rating->rating}}",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount" : "{{$rating->count}}"
  }
  </script>
