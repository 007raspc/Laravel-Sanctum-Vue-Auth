<template>
    <div class="row">
        <div class="col-12 mb-3">
            <router-link class="btn btn-success" :to="{name: 'products.index'}">Back</router-link>
        </div>
        <div class="col-md-8">
            <div ref="main_anker" data-name="main_anker">
                <div class="row mb-3" v-if="default_data.types">
                    <label for="type" class="col-sm-3 col-form-label">Type</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="type" id="type" required=""
                                :class="{ 'is-invalid': errors.type }"
                                v-model="data.type">
                            <option disabled value="">Please select type</option>
                            <option v-for="type in default_data.types" :value="type">{{ type }}</option>
                        </select>
                        <div class="invalid-feedback" v-if="errors.type">
                            <small class="d-inline-block" v-for="(error, index) in errors.type"
                                   :key="index">
                                {{ error }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="article" class="col-sm-3 col-form-label">Article</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="article" required=""
                               :class="{ 'is-invalid': errors.article }"
                               v-model="data.article">
                        <div class="invalid-feedback" v-if="errors.article">
                            <small class="d-inline-block" v-for="(error, index) in errors.article"
                                   :key="index">
                                {{ error }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" required=""
                               :class="{ 'is-invalid': errors.name }"
                               v-model="data.name">
                        <div class="invalid-feedback" v-if="errors.name">
                            <small class="d-inline-block" v-for="(error, index) in errors.name"
                                   :key="index">
                                {{ error }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row mb-3" v-if="default_data.colors">
                    <label for="color" class="col-sm-3 col-form-label">Color</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <select class="form-select" name="type" id="color" required=""
                                    :class="{ 'is-invalid': errors.color }"
                                    v-model="data.color">
                                <option disabled value="">Please select type</option>
                                <option v-for="color in default_data.colors" :value="color">{{ color }}</option>
                            </select>
                            <button class="btn btn-outline-primary" type="button">Add new</button>
                            <div class="invalid-feedback" v-if="errors.color">
                                <small class="d-inline-block" v-for="(error, index) in errors.color"
                                       :key="index">
                                    {{ error }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3" v-if="default_data.sizes">
                    <label for="size" class="col-sm-3 col-form-label">Size</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <select class="form-select" name="type" id="size" required=""
                                    :class="{ 'is-invalid': errors.size }"
                                    v-model="data.size">
                                <option disabled value="">Please select type</option>
                                <option v-for="size in default_data.sizes" :value="size">{{ size }}</option>
                            </select>
                            <button class="btn btn-outline-primary" type="button">Add new</button>
                            <div class="invalid-feedback" v-if="errors.size">
                                <small class="d-inline-block" v-for="(error, index) in errors.size"
                                       :key="index">
                                    {{ error }}
                                </small>
                            </div>
                        </div>
                        <div class="invalid-feedback" v-if="errors.size">
                            <small class="d-inline-block" v-for="(error, index) in errors.size"
                                   :key="index">
                                {{ error }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div ref="second_anker" data-name="second_anker">2</div>
            <div ref="third_anker" data-name="third_anker">3</div>
            <div ref="fourth_anker" data-name="fourth_anker">4</div>
            <button @click.prevent="create()" class="btn btn-success float-end">Create</button>
        </div>
        <div class="col-md-4">
            <div class="list-group d-none d-md-block">
                <button class="list-group-item list-group-item-action"
                   @click.prevent="ankerLink('main_anker')"
                   :class="{ active: scroll_spy.is_active === 'main_anker' }">Main</button>
                <button class="list-group-item list-group-item-action"
                   @click.prevent="ankerLink('second_anker')"
                   :class="{ active: scroll_spy.is_active === 'second_anker' }">Characteristics</button>
                <button class="list-group-item list-group-item-action"
                   @click.prevent="ankerLink('third_anker')"
                   :class="{ active: scroll_spy.is_active === 'third_anker' }">Images/Files</button>
                <button class="list-group-item list-group-item-action"
                   @click.prevent="ankerLink('fourth_anker')"
                   :class="{ active: scroll_spy.is_active === 'fourth_anker' }">Description</button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
import {ScrollSpy} from "bootstrap";

export default {
    name: "Create Product Component",
    data() {
        return {
            default_data: {
                types: null,
                colors: null,
                sizes: null,
            },
            data: {
                type: null,
                article: null,
                name: null,
                size: null,
                color: null,
            },
            scroll_spy: {
                is_active: 'main_anker'
            },
            errors: {},
        }
    },
    methods: {
        ...mapActions([
            'productCreate',
            'productStore',
        ]),
        create() {
            this.productStore(this.data)
                .then(response => {
                    this.$router.push({name: 'products.index'})
                })
                .catch(error => {
                    this.errors = error.errors || {}
                })
        },
        ankerLink(link) {
            const element = this.$refs[link];
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' })
            }
        },
        observeElements() {
            const observer = new IntersectionObserver((entries) => {
                for (const entry of entries) {
                    if (entry.isIntersecting) {
                        this.scroll_spy.is_active = entry.target.dataset.name
                        break;
                    }
                }
            }, { threshold: 0.1 });
            Object.values(this.$refs).forEach(element => {
                observer.observe(element)
            });
        },
    },
    components: {
    },
    mounted() {
        this.observeElements()
        this.productCreate()
            .then(response => {
                this.default_data = response.data
            })
        console.log('Create Product Component')
    },
}
</script>
