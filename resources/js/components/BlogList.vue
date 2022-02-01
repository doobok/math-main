<template>
    <div class="px-2 py-6 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-4 lg:py-8">
        <div class="grid gap-5 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">

            <div v-for="n in news" class="overflow-hidden transition-shadow duration-300 bg-white rounded">
                <a :href="getLink(n.slug)" aria-label="Article"><img v-bind:src="'/storage/' + n.image" class="object-cover w-full h-64 rounded" alt="" /></a>
                <div class="py-5 mx-2">
                    <p class="mb-2 text-xs font-semibold text-gray-600 uppercase">
                        {{n.created_at}}
                    </p>
                    <a :href="getLink(n.slug)" aria-label="Article" class="inline-block mb-3 text-black transition-colors duration-200 hover:text-green-500">
                        <p class="text-2xl font-bold leading-5">
                            {{n.h1}}
                        </p>
                    </a>
                    <p class="mb-4 text-gray-700">
                        {{n.description}}
                    </p>
                    <div class="flex space-x-4">
                        <a :href="getLink(n.slug)" aria-label="views" class="flex items-start text-gray-800 group">
                            <div class="mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="w-6 h-6 text-gray-600 transition-colors duration-200 group-hover:text-green-500"
                                >
                                    <path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.21 0-4 1.791-4 4s1.79 4 4 4c2.209 0 4-1.791 4-4s-1.791-4-4-4zm-.004 3.999c-.564.564-1.479.564-2.044 0s-.565-1.48 0-2.044c.564-.564 1.479-.564 2.044 0s.565 1.479 0 2.044z"/>
                                </svg>
                            </div>
                            <p class="font-semibold">{{n.views}}</p>
                        </a>
                        <a :href="getLink(n.slug)+'#rating'" aria-label="rating" class="flex items-start text-gray-800 group">
                            <div class="mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="w-6 h-6 text-gray-600 transition-colors duration-200 group-hover:text-yellow-500"
                                >
                                    <path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524-4.721 2.525.942-5.27-3.861-3.71 5.305-.733 2.335-4.817zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div v-if="!last" class="m-auto text-gray-700 transition-colors duration-200 hover:text-green-500">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-16 cursor-pointer"
                     @click="loadBlog()"
                >
                    <path d="M16.965 2.381c3.593 1.946 6.035 5.749 6.035 10.119 0 6.347-5.153 11.5-11.5 11.5s-11.5-5.153-11.5-11.5c0-4.37 2.442-8.173 6.035-10.119l.608.809c-3.353 1.755-5.643 5.267-5.643 9.31 0 5.795 4.705 10.5 10.5 10.5s10.5-4.705 10.5-10.5c0-4.043-2.29-7.555-5.643-9.31l.608-.809zm-4.965-2.381v14.826l3.747-4.604.753.666-5 6.112-5-6.101.737-.679 3.763 4.608v-14.828h1z"/>
                </svg>
            </div>


        </div>
    </div>
</template>

<script>
export default {
    props: ['lang'],
    data(){
        return{
            news: [],
            skip: 0,
            load: false,
            last: false,
        }
    },
    mounted(){
        this.loadBlog();
    },
    methods: {
        loadBlog(){
            this.load = true;
            axios
                .get('/api/v1/blog-load', { params: {skip: this.skip, lang: this.lang}})
                .then(response => {
                    if (response.data.length < 10) {
                        this.last = true
                    }
                    this.news = [].concat(this.news,response.data);
                    this.skip = this.skip + 10;
                    this.load = false;
                });
        },
        getLink(s){
            return this.lang === 'ru' ? '/blog/' + s : '/uk/blog/' + s
        }
    }
}
</script>
