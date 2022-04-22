<template>
    <form @click.prevent="" class="mt-4">
        <input type="search" @input="searchRefresh(search)" v-model="search" required />
        <i class="fa fu fa-search"></i>
        <i @click="clear" class="bg-white fa fii fa-window-close"></i>
    </form>
</template>

<script>
export default {
    data() {
        return {
            search: '',

        }
    },
    emits:[
        'searchRefresh'
    ],
    methods: {
        searchRefresh(search) {
            this.$emit('searchRefresh', search);
        },
        clear(){
            this.search = '';
            this.$emit('searchRefresh', '');
        }
    }
};
</script>

<style scoped>

form {
    position: relative;
    /* top: 50%;*/
    left: 50%;
    transform: translate(-50%, -50%);
    transition: all 1s;
    width: 50px;
    height: 50px;
    background: white;
    box-sizing: border-box;
    border-radius: 25px;
    border: 4px solid #942CAE;
    padding: 5px;
}
@media (max-width: 768px) {
    form {
        margin-top: 2rem;
    }
}

input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 42.5px;
    line-height: 30px;
    outline: 0;
    border: 2px solid #942CAE;
    display: none;
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
}
.fu {
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    color: #942CAE;
    text-align: center;
    font-size: 1.2em;
    transition: all 1s;
    z-index: 2;
    background-color: rgb(255, 255, 255);
}
.fii{
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 50%;
    color: #942CAE;
    text-align: center;
    font-size: 1.2em;
    transition: all 1s;
    z-index: 1;
}
input:focus
{
    padding-left: 10%;
}

form:hover,
form:valid {
    width: 50vw;
    cursor: pointer;
}

form:hover input,
form:valid input {
    display: block;
}

form:hover .fa ,
form:hover .fii,
form:hover .fu,
form:valid .fa {
    background: #942CAE !important;
    color: white;
    border: 6px #942CAE;
}

a {
    display: none;
    position: absolute;
    top: 70px;
    bottom: 0;
    left: 0;
    right: 0;
    font-size: 20px;
    color: white;
    text-align: center;
    width: 100%;
}

form:valid a {
    display: block;
}
</style>
