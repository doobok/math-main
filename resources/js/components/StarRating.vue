<template>
  <div class="flex flex-wrap mt-10">
    <div class="flex flex-nowrap">
      <span v-for="n in 5"
        class="text-gray-300 cursor-pointer"
        @mouseover="hoverRating(n)"
        @mouseleave="hoverLeave()"
        @click="setRating(n)"
        v-bind:class="{ 'text-yellow-300': starStyle(n) }">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 md:h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg>
      </span>
    </div>

    <template v-if="saverating > 0">
      <span class="text-2xl md:text-4xl mx-4 text-gray-400 font-medium">{{saverating}}</span>
      <span v-if="voted" class="text-lg text-gray-400 self-center">- Ваш голос</span>
      <span class="text-lg flex flex-nowrap text-gray-500"
        v-bind:class="{ 'hidden': voted }"
        >
        <svg xmlns="http://www.w3.org/2000/svg"class="h-8 self-center mx-2" viewBox="0 0 24 26" fill="currentColor"><path d="M21.292 9.349c-.43-4.813-3.604-9.349-9.292-9.349s-8.862 4.536-9.292 9.349c-1.859.165-2.708 1.921-2.708 3.964 0 1.755.975 3.967 3.104 4.891 2.935 5.371 7.534 5.796 8.896 5.796s5.961-.425 8.896-5.796c2.129-.925 3.104-3.136 3.104-4.891 0-2.019-.841-3.798-2.708-3.964zm-1.425 7.11c-.246.083-.45.259-.569.491-2.406 4.686-6.194 5.05-7.298 5.05s-4.892-.364-7.298-5.05c-.119-.231-.323-.407-.569-.491-2.448-.829-2.553-4.364-1.553-5.012.206-.133.49-.134.671-.053.66.292 1.406-.189 1.406-.914l.02-.566c1.803-.406 4.331-2.774 4.964-4.039-.069.852-.891 3.254-2.076 4.063 2.748 0 6.25-2.507 7.685-4.828.088 2.081 2.114 4.016 4.035 4.311.034.354.058.707.058 1.059 0 .723.745 1.207 1.406.914.141-.063.435-.1.671.053 1 .648.895 4.183-1.553 5.012zm-3.367-3.959c0 .828-.56 1.5-1.25 1.5s-1.25-.672-1.25-1.5.56-1.5 1.25-1.5 1.25.672 1.25 1.5zm-7.75 1.5c-.69 0-1.25-.672-1.25-1.5s.56-1.5 1.25-1.5 1.25.672 1.25 1.5-.56 1.5-1.25 1.5zm.25 3h6s-.765 2.354-3 2.354c-2.153 0-3-2.354-3-2.354zm20 0c-2.781.797-3.717-1.06-4-4-.496-5.152-.973-8.926-4.051-8.255-.378-.844-.84-1.683-1.588-2.477.873-1.127 2.533-2.268 4.431-2.268 7.316 0 3.77 11.491 3.77 14 0 1.5.294 2.323 1.438 3z"/></svg>
        <span class="self-center text-2xl">{{count}}</span>
      </span>
    </template>

  </div>
</template>

<script>
export default {
  props: ['slug'],
  data(){
      return{
        rating: 0,
        saverating: 0,
        count: 1,
        voted: false,

    }
  },
  mounted: function (){

        this.getRating();

  },
  methods: {
    findRateLocal() {
      if (localStorage.getItem('stars')) {
        try {
          let stars = JSON.parse(localStorage.getItem('stars'));
          if (stars) {
            let myVote = stars.find(star => star.slug === this.slug).rating;
            if (myVote != null) {
              this.voted = true;
              this.rating = myVote;
              this.saverating = myVote;
              // console.log(myVote);
            }
          }

        } catch(e) {
          // console.log('Ошибка чтения рейтинга' + e);
          // console.log(typeof(myVote));
          // localStorage.removeItem('stars');
        }
      }
    },
    starStyle(n) {
      if (this.rating >= n) {
        return true;
      }
    },
    hoverRating(n) {
      if (!this.voted) {
        this.rating = n;
      }
    },
    hoverLeave() {
      if (!this.voted) {
        this.rating = this.saverating;
      }
    },
    getRating() {
      axios
            .get('/api/v1/get-rating', { params: {slug: this.slug}})
            .then(response => {
                this.rating = response.data.rating;
                this.saverating = response.data.rating;
                this.count = response.data.count;
                this.findRateLocal();
            });
    },
    setRating(n) {
      if (!this.voted) {

        axios
            .post('/api/v1/set-rating', {slug: this.slug, rating: n, count: this.count})
            .then(response => {
              this.voted = true,
              this.saverating = n;

              // set to localStorage
              let vote = {slug: this.slug, rating: n};
              this.SaveDataToLocalStorage(vote);

            })
            .catch(err => {
              let e = { ...err    }
              console.log(e);
              alert('Не удалось проголосовать, попробуйте повторить попытку позже');
            });
      }
    },
    SaveDataToLocalStorage(data)
    {
        var a = [];
        // сохранение в массив в localStorage
        a = JSON.parse(localStorage.getItem('stars')) || [];
        a.push(data);
        localStorage.setItem('stars', JSON.stringify(a));
    }
  }

}
</script>
