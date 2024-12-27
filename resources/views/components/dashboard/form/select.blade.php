<div class="formGroup text-slate-500">
    <label for="basicSelect" class="form-label">Basic Select</label>
    <select name="basicSelect" id="basicSelect" class="form-control w-full mt-2">
      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-500">Select an option</option>
     @foreach ($items as $key => $item)
         <option value="{{$key}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-500">{{$item}}</option>
     @endforeach
    </select>
</div>