import axios from "../plugins/axios";


export default {
    async uploadImagesToBanner(params) {
        const formData = new FormData();
        formData.append("file", params.image);
        formData.append("name", params.name);
        formData.append("section", params.section_id);
        formData.append("prefix", params.prefix);
        formData.append("alt", params.alt);
        formData.append("checkbox", params.checkbox);
        return await axios.post(`/uploadImagesToBanner`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })

    },
    async updateBanner(params) {
        return await axios.post(`/updateBanner`, params);

    },
    async deleteBanner(params) {
        return await axios.post(`/deleteBanner`, params);

    },
    async fetchSection1(params) {
        return await axios.get('fetchImagesToBanner', params);
    },
    async fetchSection2(params) {
        return await axios.get('fetchCards', params);
    },

}
