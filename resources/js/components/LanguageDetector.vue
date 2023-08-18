<template>
    <div v-if="!selected" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-70 z-50">
        <div class="bg-white p-8 rounded-md shadow-md">
            <p class="text-gray-600">Оберіть мову якою бажаєте переглядати сайт</p>
            <div class="mt-4 flex justify-end">
                <button class="w-1/2 px-4 py-2 bg-green-400 text-white rounded-md hover:bg-gray-400" @click="setLanguage('uk')">Українська</button>
                <button class="w-1/2 ml-2 px-4 py-2 bg-blue-400 text-white rounded-md hover:bg-gray-400" @click="setLanguage('ru')">Русский</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LanguageDetector",
    data() {
        return {
            selected: true,
        }
    },
    methods: {
        setLanguage($lang) {
            localStorage.setItem('selected_language', $lang)
            window.location.href = '/setlocale/' + $lang
        }
    },
    mounted() {
        this.selected = localStorage.getItem('selected_language')
    }
}
</script>
