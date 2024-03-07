@if ($formType == 'student')
    <h2>New Student Application</h2>
@else
    <h2>New Instructor Application</h2>
@endif

<table border="1">
    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>

    <tr>
        <td>Name</td>
        <td>{{ $formData['name'] }}</td>
    </tr>

    <tr>
        <td>Email</td>
        <td>{{ $formData['email'] }}</td>
    </tr>

    <tr>
        <td>Phone</td>
        <td>{{ $formData['phone'] }}</td>
    </tr>

    <tr>
        <td>University</td>
        <td>{{ $formData['universty'] }}</td>
    </tr>

    @if ($formType == 'student')
        <tr>
            <td>Country</td>
            <td>{{ $formData['country'] }}</td>
        </tr>

        <tr>
            <td>Faculty</td>
            <td>{{ $formData['faculty'] }}</td>
        </tr>

        <tr>
            <td>Materials</td>
            <td>{{ implode(', ', $formData['materials_names']) }}</td>
        </tr>

        <tr>
            <td>Course Type</td>
            <td>{{ isset($formData['courseType']) ? $formData['courseType'] : '' }}</td>
        </tr>

        <tr>
            <td>Materials</td>
            <td>
                @if (isset($formData['materials_names']) && is_array($formData['materials_names']))
                    @foreach ($formData['materials_names'] as $material)
                        <li>
                            {{ $material }}
                        </li>
                    @endforeach
                @endif
            </td>
        </tr>

        <tr>
            <td>Year</td>
            <td>{{ isset($formData['year']) ? $formData['year'] : '' }}</td>
        </tr>

        <tr>
            <td>Age</td>
            <td>{{ isset($formData['age']) ? $formData['age'] : '' }}</td>
        </tr>

        <tr>
            <td>Nationality</td>
            <td>{{ isset($formData['nationalty']) ? $formData['nationalty'] : '' }}</td>
        </tr>

        <tr>
            <td>Gender</td>
            <td>{{ isset($formData['gender']) ? $formData['gender'] : '' }}</td>
        </tr>

        <tr>
            <td>WhatsApp Number</td>
            <td>{{ isset($formData['whats']) ? $formData['whats'] : '' }}</td>
        </tr>

        <tr>
            <td>Telegram Number</td>
            <td>{{ isset($formData['telegram']) ? $formData['telegram'] : '' }}</td>
        </tr>
    @endif

</table>
