export default {
  template: `
    <button
      @click="handleClick"
      :class="[
        'py-1 px-2 rounded font-semibold text-xs uppercase transition duration-150 ease-in-out',
        tag === currentTag
          ? 'bg-slate-700'
          : 'bg-slate-800 hover:bg-slate-700/60 cursor-pointer'
      ]"
    >
      {{ tag }}
    </button>
  `,

  props: {
    tag: String,
    currentTag: String,
  }, 

  methods: {
    handleClick() {
      this.$emit('selected', this.tag)
    }
  }
}
