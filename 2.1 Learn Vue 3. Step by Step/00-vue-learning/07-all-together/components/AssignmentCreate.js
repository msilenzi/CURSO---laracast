export default {
  template: `
    <form class="relative" @submit.prevent="handleSubmit">
      <input
        v-model="newAssingmentValue"
        type="text"
        placeholder="New assignment..."
        class="bg-slate-700 rounded-lg transition duration-200 ease-in-out w-full block p-2 pr-18"
      />
      <button
        type="submit"
        class="absolute top-1 right-1 z-1 bg-slate-800 shadow py-2 px-2 rounded hover:bg-slate-900 transition duration-150 ease-in-out font-semibold text-xs uppercase"
      >
        Create
      </button>
    </form>
  `,

  data() {
    return {
      newAssingmentValue: "",
    }
  },

  props: {
    onSubmit: Function
  },

  methods: {
    handleSubmit() {
      const trimmedValue = this.newAssingmentValue.trim();
      if (trimmedValue.length !== 0) {
        this.$emit('create', trimmedValue)
        this.newAssingmentValue = "";
      }
    }
  }
};
