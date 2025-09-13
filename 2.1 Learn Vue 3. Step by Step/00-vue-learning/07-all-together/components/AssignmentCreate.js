export default {
  template: `
    <form class="space-y-2" @submit.prevent="handleSubmit">
      <input
        v-model="assingmentValue"
        type="text"
        placeholder="New assignment..."
        class="bg-slate-700 rounded-lg w-full block p-2"
      />
      <div class="flex gap-2">
        <input
          v-model="tagValue"
          type="text"
          placeholder="Tag"
          class="bg-slate-700 rounded-lg w-full p-2"
        />
        <button
          type="submit"
          class="bg-slate-800 py-2 px-2 rounded-lg hover:bg-slate-700/50 transition duration-150 ease-in-out font-semibold text-xs uppercase cursor-pointer"
        >
          Create
        </button>
      </div>
    </form>
  `,

  data() {
    return {
      assingmentValue: "",
      tagValue: "",
    }
  },

  props: {
    onSubmit: Function
  },

  methods: {
    handleSubmit() {
      const trimmedValue = this.assingmentValue.trim();
      const trimmedTag = this.tagValue.trim().toLowerCase();
    
      if (trimmedValue.length !== 0 && trimmedTag.length !== 0) {
        this.$emit('create', trimmedValue, trimmedTag)
        this.assingmentValue = "";
        this.tagValue = "";
      }
    }
  }
};
