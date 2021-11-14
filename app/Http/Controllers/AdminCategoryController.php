<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

    class AdminCategoryController extends Controller
    {
        public function index()
        {
            return view('admin.categories.index',[
                'categories' => Category::latest()->paginate(50)
            ]);
        }

        public function create()
        {

            return view ('admin.categories.create');
        }

        /**
         * @throws \Exception
         */
        public function store()
        {
            $attributes = array_merge($this->validateCategory(), [
                'slug' => Str::slug(request('name'),'-') . '-' . time(),
            ]);

            Category::create($attributes);

            return redirect('admin/categories')->with('success', 'New Category Added!');
        }

        public function edit(Category $category)
        {
            return view ('admin.categories.edit', ['category' => $category]);
        }

        public function update(Category $category)
        {
            $attributes = $this->validateCategory();

            $category->update($attributes);

            return redirect('admin/categories')->with('success', 'Category Updated!');
        }

        public function destroy(Category $category)
        {
            $category->delete();
            return back()->with('success', 'Category Deleted!');
        }

        protected function validateCategory(Category $category = null): array
        {
            $category ??= new Category();

            return request()->validate([
                'name' => 'required|unique:categories,name',
            ]);
        }
    }
