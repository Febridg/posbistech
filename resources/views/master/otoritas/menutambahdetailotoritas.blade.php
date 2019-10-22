@foreach(DetailmodulHelper::get_menu($otoritas->m_modul_id) as $mn)
<tr>
    <td></td>
    <td>{{ $mn->m_menus->nama }}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
@foreach(DetailmodulHelper::get_submenu($mn->m_menu_id,$otoritas->m_modul_id) as $smn)
<tr>
    <td><input type="checkbox" name="sm{{ $mn->m_menu_id }}{{ $smn->m_submenu_id }}" value="{{ $smn->m_submenu_id }}">
    </td>
    <td>--- {{ $smn->m_submenus->nama }}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
@endforeach
@endforeach