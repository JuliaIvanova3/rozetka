<template>
    <div class="modal-wrapper" ref="modal_wrapper">
        <div class="modal">
            <div class="header">
                <p class="header-info">Info window </p>
                <span class="close" @click="close">X</span>
            </div>
            <div class="content">
                <form>
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control"  v-model="mTitle">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control"  v-model="mDescription">
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" class="form-control"  v-model="mPrice">
                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="text" class="form-control"  v-model="mImage">
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                         <select v-model="selectCategory" class="form-control mb-2 mr-sm-2">
                            <option disabled value="">{{mCategoryId}} - {{mCategory}}  </option>
                            <option 
                                v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            > {{category.id}} - {{category.title}} </option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn btn-success" @click="update">Save Changes</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'edit-product',
    props: {
        title: {    
            type: String,
            default: () => ''
        },
        description: {
            type: String,
            default: () => ''
        },
        price: {
            type: Number,
            default: () => 0
        },
        image: {
            type: String,
            default: () => ''
        },
        category: {
            type: String,
            default: () => ''
        },
        categoryId: {
            type: String,
            default: () => ''
        },
        categories: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            info: 'Thanks for yours order...',
            mTitle: this.title,
            mDescription: this.description,
            mPrice: this.price,
            mImage: this.image,
            mCategory: this.category,
            mCategoryId: this.categoryId,
            selectCategory: this.categoryId
        }
    },
    methods: {
        close() {
            this.$emit('close');
        },
        update() {
            const formData = new FormData();
            formData.append('title', this.mTitle);
            formData.append('description', this.mDescription);
            formData.append('price', this.mPrice);
            formData.append('image', this.mImage);
            formData.append('category_id', this.selectCategory);

            console.log(formData);
            this.$emit('update', formData);
        }
    },
    mounted() {
        let vm = this;
      document.addEventListener('click', function (item) {
        if (item.target === vm.$refs['modal_wrapper']) {
          vm.close()
        }
      })
    }
}
</script>

<style scoped>
.modal-wrapper {
    background: rgba(64,64,64, .4);
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    right: 0;
    left: 0;
    top: 0;
    bottom: 0;
}
.modal {
    top: 150px !important;
    right: 16px;
    display: flex !important;
    background: #ffffff;
    flex-direction: column !important;
    height: 550px !important;
    width: 450px !important;
    margin-left: 350px;
    box-shadow: 0 0 17px 0 #e7e7e7;
    border-radius: 15px 15px 15px 15px;
}
.header {
    padding: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #26ae68;
    flex-direction: row !important;
    color: #ffffff;
    height: 40px;
}
.header-info {
    margin-bottom: 0;
}
.content {
    height: 450px;
    padding: 10px;
    align-content: flex-start !important;
    margin-top: 40px;
}
.footer {
    padding: 8px;
    background: #e7e7e7;
    height: 55px;
    margin-top: 450px;
}
.bth {
    margin-top: 8px !important;
}
.close {
    cursor: pointer;
}

</style>