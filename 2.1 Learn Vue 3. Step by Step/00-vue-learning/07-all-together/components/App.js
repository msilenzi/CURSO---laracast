import Assignments from "./Assignments.js"

export default {
  template: `
    <div class="w-96 mx-auto mt-10">
      <assignments />
    </div>
  `,

  components: {
    assignments: Assignments
  }
}
